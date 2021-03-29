<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::all();
        return response()->json($school);
    }
    // yoursupport@gtpl.net

    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'name' => ['required','string','max:255'],
            'email' => ['required','unique:schools'],
            'logo' => ['required','image','max:10000'],
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors()->toJson(),400);
        }

        $image = time().'.'. $request->logo->extension();

        $newImg = $request->logo->move(public_path('images'),$image);

        $school = School::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $newImg,
            'website' => $request->website,
        ]);
        return response()->json([
            'message' => 'School succesfully registered',
            'school' => $school
        ],201);
    }
}
