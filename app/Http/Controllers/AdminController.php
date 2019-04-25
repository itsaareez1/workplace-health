<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function addcoupon(Request $request){

        if ($request->session()->has('admin_id')){
            $request->validate([
                'title' => 'required|max:50',
                'code' => 'required|max:10'
            ]);
            
            DB::table('coupons')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('coupon')->with('status','Coupon created successfully.');
        }
        else{

            return redirect('admin-login');
        }
    }

    public function addDistricts(Request $request){
        if ($request->session()->has('admin_id')){

            $request->validate([
                'name' => 'required|max:100'
            ]);
            
            DB::table('districts')->insert([
                'title' => $request->name,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('coupon')->with('status','District added successfully.');

        }
        else{

            return redirect('admin-login');
        }

    }
    public function addFaqs(Request $request){
        if ($request->session()->has('admin_id')){
        }
        else{

            return redirect('admin-login');
        }


    }
    public function addNews(Request $request){
        if ($request->session()->has('admin_id')){
        }
        else{

            return redirect('admin-login');
        }


    }
    public function addProducts(Request $requests){
        if ($request->session()->has('admin_id')){
        }
        else{

            return redirect('admin-login');
        }


    }
    public function addVouchers(Request $request){

        if ($request->session()->has('admin_id')){
            $request->validate([
                'title' => 'required|max:50',
                'description' => 'required|max:500',
                'code' => 'required|max:10'
            ]);

            DB::table('coupons')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'description' => $request->description,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('voucher')->with('status','Voucher created successfully.');
    
        }
        else{

            return redirect('admin-login');
        }


    
    }
}
