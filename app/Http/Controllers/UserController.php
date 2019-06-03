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
/*                'terms' => 'accepted' */
            ]);    

            if ($request->type == "2"){
                $request->validate([
                    'question1' => 'required',
                    'question2' => 'required',
                    'question3' => 'required',
                    'question4' => 'required',
                    'question5' => 'required',
                    'question6' => 'required',
                    'question7' => 'required',
                    'question8' => 'required',
                    'question9' => 'required'
                ]);   

                DB::table('users')->insert([
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'company' => $request->company,
                    'phone' => $request->phone,
                    'workpermit' => $request->permit,
                    'password' => md5($request->password),
                    'terms' => $request->terms,
                    'q1' => $request->question1,
                    'q2' => $request->question2,
                    'q3' => $request->question3,
                    'q4' => $request->question4,
                    'q5' => $request->question5,
                    'q6' => $request->question6,
                    'q7' => $request->question7,
                    'q8' => $request->question8,
                    'q9' => $request->question9

                ]);
        
                return redirect('login')->with('status', 'Account created successfully. Login Now!');

            }
          
        
/*
        DB::table('users')->insert([
            'name' => $request->fullname,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => md5($request->password),
            'terms' => $request->terms  
        ]);

        return redirect('login')->with('status', 'Account created successfully. Login Now!');
*/
        return view('web.terms',[
            'name' => $request->fullname,
            'email' => $request->email,
            'company' => $request->company,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => md5($request->password),
            'terms' => $request->terms
        ]);
    }

    public function login(Request $request){

    

        $request->validate([
            'username' => 'required|max:191',
            'password' => 'required|min:6'
        ]);

        $results = DB::table('users')
        ->where('email', $request->username)
        ->where('password', md5($request->password))->first();


        if (!empty($results)){
            session(['userst' => 'logged', 'name' => $results->name, 'usr_id' => $results->id]);
            return redirect('index')->with('status','Logged in successfully.');        
        }
        else{
            return redirect('login')->with('status','Login failed! Username or password is wrong.');   
        }
    }

    public function signout(Request $request){
        $request->session()->flush();

        return redirect('/');
    }

    public function contactus(Request $request){
        $request->validate([
            'fullname' => 'required|max:100',
            'email' => 'required|max:50',
            'phone' => 'required|max:20',
            'message' => 'required|max:500'
        ]);

        DB::table('contactus')->insert([
            'name' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,
            'state' => 1
        ]);

        return redirect('contact')->with('status', 'Form submitted successfully. We will get back to you as soon as possible.');

        
    }
    public function editProfile(Request $request){
       if ($request->session()->has('usr_id')){

            $id = $request->session()->get('usr_id');

            $request->validate([
                
                'name' => 'max:100',
                'phone' => 'max:13',
                'email' => 'max:191'
            ]);

            if (isset($request->gender)){

                
                $gender = $request->get('gender');
                DB::table('users')->where('id','=', $id)->update([
                    'salutation' => $gender
                ]);
                
            }
            if (isset($request->name)){

                DB::table('users')->where('id','=', $id)->update([
                    'name' => $request->name
                ]);

            }
            if (isset($request->phone)){

                DB::table('users')->where('id','=', $id)->update([
                    'phone' => $request->phone,
                    'phonestatus' => 0
                ]);

            }
            if (isset($request->email)){

                DB::table('users')->where('id','=', $id)->update([
                    'email' => $request->email,
                    'emailstatus' => 0
                ]);

            }

            return redirect('editProfile')->with('The profile infromation has been updated successfully.');

           }
           else{
              return redirect('login');
        }
    }

    public function changePass(Request $request){

        if ($request->session()->has('usr_id')){

            $request->validate([
                'opass' => 'required|min:6',
                'npass' => 'required|min:6|required_with:cpass|same:cpass',
                'cpass' => 'min:6'
            ]);
    
            $result = DB::table('users')
            ->where('id' ,'=', $request->session()->get('usr_id'))
            ->where('password', '=', md5($request->opass))->first();

            if (!empty($result)){

                DB::table('users')->where('id', '=', $request->session()->get('usr_id'))->update([
                    'password' => md5($request->npass)
                ]);
                return redirect('changepass')->with('status',"Password changed successfully");

            }
            else{
                return redirect('changepass')->with('wrong', 'Old password is wrong.');
            }
    
        }
        else {
            return redirect('login');
        }
    }
}
 