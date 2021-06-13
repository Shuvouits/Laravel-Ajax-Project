<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;

class SystemController extends Controller
{

    public function home()
    {
        $information_data = Information::orderBy('created_at', 'desc')->get();
        return view('welcome', ['information_data'=>$information_data]);
    }
    public function record_data(Request $request)
    {
        $first_name = $request->input('first_name');
        $email = $request->input('email');
        $father_name = $request->input('father_name');
        $mother_name = $request->input('mother_name');
        $address = $request->input('address');

        $information = New Information();
        $information->first_name = $first_name;
        $information->email = $email;
        $information->father_name = $father_name;
        $information->mother_name = $mother_name;
        $information->address = $address;
        $information->save();
        return response()->json($information);
    }
}
