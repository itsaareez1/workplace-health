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
                    'company_id' => 'required|max:100',
                    'phone' => 'required|min:8,max:13',
                    'permit' => 'required|max:30',
                    'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
                    'password_confirmation' => 'min:6',
                ]);   



                return view('web.terms',[
                    'name' => $request->fullname,
                    'email' => $request->email,
                    'company_id' => $request->company_id,
                    'phone' => $request->phone,
                    'workpermit' => $request->permit,
                    'password' => md5($request->password),
                ]);
        
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

    }

    public function sign(Request $request){
        
        return view('web.terms',[
            'name' => $request->fullname,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => md5($request->password),
        ]);
    }
    public function terms(Request $request){
        
        $request->validate([
            'nam' => 'required|max:100',
            'ic' => 'required|max:50',
            'signature' => 'required|max:100',
            'dat' => 'required',
            'q1' => 'required|in:0,1',
            'q2' => 'required|in:0,1',
            'q3' => 'required|in:0,1',
            'q4' => 'required|in:0,1',
            'q5' => 'required|in:0,1',
            'q6' => 'required|in:0,1',
            'q7' => 'required|in:0,1',
            'q8' => 'required|in:0,1',
            'q9' => 'required|in:0,1'
        ]);   

        DB::table('users')->insert([
            'name' => $request->fullname,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => $request->password,
            'nam' => $request->nam,
            'IC' => $request->ic,
            'signature' => $request->signature,
            'dat' => $request->dat,
            'q1' => $request->q1,
            'q2' => $request->q2,
            'q3' => $request->q3,
            'q4' => $request->q4,
            'q5' => $request->q5,
            'q6' => $request->q6,
            'q7' => $request->q7,
            'q8' => $request->q8,
            'q9' => $request->q9

        ]);

        return redirect('login')->with('status', 'Account created successfully. Login Now!');

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

            return redirect('editProfile')->with('status', 'The profile infromation has been updated successfully.');

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
 