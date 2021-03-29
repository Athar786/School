<?php

namespace App\Http\Controllers;

use App\School;
use App\Campuses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CampusesController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name' => ['required','string','max:255'],
            'email' => ['required','email'],
            'phone' => ['required','digits:10'],
            'address' => ['required']
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors()->toJson(),400);
        }

        $scl_email = DB::table('schools')->select('email')->where('id','=',$request->school_id)->get();
        $campuse = Campuses::create([
            'name' => $request->name,
            'email'=>$request->email,
            'school_id'=>$request->school_id,
            'phone'=>$request->phone,
            'address'=>$request->address,
        ]);

        $email_data = array(
            'name' => $request->name,
            'email'=>$request->email,
        );

        Mail::send('welcome_email',$email_data, function ($message) use($email_data) {
            $message->to($email_data['email'], $email_data['name'])
                ->subject('Welcome to School Campase')
                ->from('atharerit@gmail.com', 'MyCampase');
        });

        return response()->json([
            'success' => 'Campuse succesfully registered',
            'campuse' => $campuse
        ],201);
    }
}
