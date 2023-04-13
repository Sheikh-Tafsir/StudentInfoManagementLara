<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\userlogin;

class UpdateController extends Controller
{
    //
    public function update (Request $request)
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
            $user = DB::table('userlogins')->where('email', '=', $email)->first();
            if ($user){
                DB::table('userlogins')
                    ->where('email', $email)
                    ->update(['password' =>  Hash::make($password)]);
                    return redirect()->route('addstudent')->with('message', 'user updated');
            }
            else{
                return redirect()->route('addstudent')->with('message', 'user dont exist');
            }
           
            
        }

    }
}
