<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Retrieve the input values from the Request object
        $password = $request->input('password');
        $email = $request->input('email');
        
        // Print the input values to the screen or log file
        // print_r($password);
        // print_r($email);

        if (empty($email) || empty($password)) {
            return redirect()->back()->with('error', 'Email or password are empty');
        }
        // Check if email and password are valid
        if ($email == '190041130tafsir@gmail.com' && $password == '123') {
            return redirect()->route('addstudent');
            
        } 
        else {

            $user = DB::table('userlogins')->where('email', '=', $email)->first();

            if ($user && Hash::check($password, $user->password)) {
                // login successful
                $request->session()->put('email', $email);
                $request->session()->put('password', $password);

                //return redirect()->route('dashboard');
                return view('dashboard', compact('email', 'password'));
            }
            else{
                return redirect()->back()->with('error', 'Invalid email or password');
            }
        }
    }
    
}
