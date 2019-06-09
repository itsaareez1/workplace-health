<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //
    public function login(Request $request){

        $request->validate([
            'email' => 'required|max:191',
            'password' => 'required|min:6'
        ]);

        $results = DB::table('admins')
        ->where('email', $request->email)
        ->where('password', md5($request->password))->first();


        if ($results != null){
            session(['adminst' => 'logged', 'name' => $results->name, 'admin_id' => $results->id]);

            return redirect('wh-dashboard');
        }
        else{
            return redirect('wh-admin')->with('status','Username or password is wrong.');   
        }
    }

    public function addcoupon(Request $request){

        if ($request->session()->has('admin_id')){
            $request->validate([
                'title' => 'required|max:50',
                'code' => 'required|max:10',
                'state' => 'required',
                'price' => 'required'
            ]);
            
            DB::table('coupons')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'price' => $request->price,
                'state' => $request->state,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('wh-coupon')->with('status','Coupon created successfully.');
        }
        else{

            return redirect('wh-admin');
        }
    }

    public function addDistricts(Request $request){
        if ($request->session()->has('admin_id')){

            $request->validate([
                'name' => 'required|max:100'
            ]);
            
            DB::table('districts')->insert([
                'name' => $request->name,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('wh-addDistrict')->with('status','District added successfully.');

        }
        else{

            return redirect('wh-admin');
        }

    }
    public function addFaqs(Request $request){
        if ($request->session()->has('admin_id')){

            $request->validate([
                'question' => 'required|max:300',
                'answer' => 'required|max:1000'
            ]);

            DB::table('faqs')->insert([
                'questions' => $request->question,
                'answer' => $request->answer,
                'admin_id' => session('admin_id')
            ]);

            return redirect('admin/faqs')->with('status', 'FAQ added successfully.');
        }
        else{

            return redirect('admin-login');
        }


    }
    public function addNews(Request $request){
        if ($request->session()->has('admin_id')){


            $image = $request->file('image')->store('news', 'public');

            $request->validate([
                'type' => 'required',
                'title' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10008',
                'description' => 'required|max:1500',
            ]);
            
            $type = "";
            if ($request->type == 2)
            {
                $type = "specific";

                DB::table('news')->insert([
                    'type' => $type,
                    'title' => $request->title,
                    'img' => $image,
                    'company_id' => $request->company,
                    'description' => $request->description,
                    'admin_id' => session('admin_id')
                ]);
        
            }
            else{
                $type = "general";
                DB::table('news')->insert([
                    'type' => $type,
                    'title' => $request->title,
                    'img' => $image,
                    'description' => $request->description,
                    'admin_id' => session('admin_id')
                ]);

            }

            return redirect('wh-addNews')->with('status', 'News added successfully.');

        }
        else{

            return redirect('wh-admin');
        }


    }
    public function addProducts(Request $request){
        if ($request->session()->has('admin_id')){
            $request->validate([
                'name' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description' => 'required|max:500',
                'price' => 'max:5',
                'specs' => 'required|max:1500',
                'type' => 'required|max:50',
                'points' => 'max:3'
            ]);

            $image = $request->file('image')->store('products', 'public');

        DB::table('products')->insert([
            'name' => $request->name,
            'img' => $image,
            'description' => $request->description,
            'price' => $request->price,
            'specification' => $request->specs,
            'type' => $request->type,
            'points' => $request->points,
            'state' => $request->state,
            'admin_id' => session('admin_id')
            ]); 

            return redirect('wh-product')->with('status', 'Product created successfully.');
        
        }
        else{

            return redirect('wh-admin');
        }


    }
    public function addVouchers(Request $request){

        if ($request->session()->has('admin_id')){
            $request->validate([
                'title' => 'required|max:50',
                'description' => 'required|max:500',
                'code' => 'required|max:10',
                'state' => 'required'
            ]);

            DB::table('vouchers')->insert([
                'title' => $request->title,
                'code' => $request->code,
                'description' => $request->description,
                'state' => $request->state,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('wh-voucher')->with('status','Voucher created successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }


    
    }

    public function createClass(Request $request){
        if ($request->session()->has('admin_id')){
            $request->validate([
                'name' => 'required|max:100',
                'image' => 'required',
                'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'time' => 'required|max:8',
                'duration' => 'required|max:10',
                'venue' => 'required|max:50',
                'description' => 'required|max:1500',
                'credits' => 'required|max:11',
                'level' => 'required|max:10',
                'slot' => 'required',
                'state' => 'required|max:50',
                'category_id' => 'required',
                'program_id' => 'required'
            ]);

            $image = $request->file('image')->store('classes', 'public');


        DB::table('classes')->insert([
                'name' => $request->name,
                'img' => $image,
                'time' => $request->time,
                'duration' => $request->duration,
                'venue' => $request->venue,
                'description' => $request->description,
                'credits' => $request->credits,
                'level' => $request->level,
                'state' => $request->state,
                'slot' => $request->slot,
                'status' => " ",                
                'category_id' => $request->category_id,
                'program_id' => $request->program_id
            ]);
    

            return redirect('wh-class')->with('status','Class created successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }

    }

    
    public function addCategories(Request $request){
        if ($request->session()->has('admin_id')){
            $request->validate([
                'name' => 'required|max:100'
            ]);

            DB::table('categories')->insert([
                'name' => $request->name,
                'admin_id' => session('admin_id') 
            ]);
    
            return redirect('wh-addCategory')->with('status','Category created successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }

    }
    public function addCompany(Request $request){
        if ($request->session()->has('admin_id')){
            $request->validate([
                'name' => 'required|max:100',
                'district_id' => 'required'
            ]);

            DB::table('companies')->insert([
                'name' => $request->name,
                'district_id' => $request->district_id
            ]);
    
            return redirect('wh-addCompany')->with('status','Company created successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }

    }
    public function postFAQ(Request $request){
        if ($request->session()->has('admin_id')){

            $request->validate([
                'question' => 'required|max:300',
                'answer' => 'required|max:1000',
            ]);

            DB::table('faqs')->insert([
                'questions' => $request->question,
                'answer' => $request->answer,
                'state' => 1,
                'admin_id' => session('admin_id')
            ]);
    
            return redirect('wh-faqs')->with('status','FAQ added successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }

    }
    public function postProgram(Request $request){
        if ($request->session()->has('admin_id')){

            $request->validate([
                'name' => 'required|max:200',
                'company' => 'required'
            ]);

            DB::table('programs')->insert([
                'name' => $request->name,
                'company_id' => $request->company,
                'admin_id' => session('admin_id')
            ]);
    
            return redirect('wh-addProgram')->with('status','Program created successfully.');
    
        }
        else{

            return redirect('wh-admin');
        }

    }
}
