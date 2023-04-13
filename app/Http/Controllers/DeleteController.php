<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\userlogin;

use Illuminate\Http\Request;

class DeleteController extends Controller
{
    //
    public function delete (Request $request)
    {
        // Retrieve the input values from the Request object
        $email = $request->input('email');
        
        // Print the input values to the screen or log file
        print_r($email);
        
        if (empty($email)) {
            return redirect()->back()->with('error', 'email is empty');
        }
        else{
            $user = DB::table('userlogins')->where('email', '=', $email)->first();
            if ($user){
                DB::table('userlogins')->where('email', $email)->delete();
                return redirect()->route('addstudent')->with('message', 'user deleted');
            }
            else{
                return redirect()->route('addstudent')->with('message', 'user dont exist');
            }
            
        }

    }
}
