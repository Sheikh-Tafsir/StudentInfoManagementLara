<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\userlogin;

class AddController extends Controller
{
    public function add(Request $request)
    {
        // Retrieve the input values from the Request object
        $password = $request->input('password');
        $email = $request->input('email');
        
        // Print the input values to the screen or log file
        print_r($password);
        print_r($email);
        
        if (empty($password) || empty($email)) {
            return redirect()->back()->with('error', 'email or password are empty');
        }
        else{
            $user = new userlogin();
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->route('addstudent')->with('message', 'new user saved');
        }

    }
}
