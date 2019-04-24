<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function signup(Request $request){

        $request->validate([
            'fullname' => 'required|max:100',
            'email' => 'required|max:191',
            'company' => 'required|max:100',
            'phone' => 'required|max:13',
            'permit' => 'required|max:30',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'terms' => 'required'

        ]);

        DB::table('users')->insert([
            'name' => $request->fullname,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => md5($request->password),
            'terms' => $request->terms  
        ]);

        return response()->json([
            'status' => "Account created successfully."
        ]);

    }
}
