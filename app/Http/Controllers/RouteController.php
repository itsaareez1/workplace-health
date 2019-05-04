<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    //
    public function test()
    {
        return view('web.test');
    }
    public function welcome()
    {

      $programs = DB::table('classes')
                    ->select('classes.*')
                    ->orderBy(DB::raw('RAND()'))
                    ->take(15)
                    ->get();


        return view('welcome');
    }
    public function index(Request $request)
    {
      if ($request->session()->has('userst'))
      {
        return view('web.index', [
          'name' => cookie('name')
        ]);
      }
      else{
        return redirect('login');
      }

    }

    public function login()
    {
      return view('web.login');
    }

    public function signup()
    {
      $companies = DB::table('companies')->get();
      return view('web.signup', ['companies' => $companies]);
    }

    public function forgetpassword()
    {
      return view('web.forgetpassword');
    }
    public function loyaltyPoints()
    {
        return view('web.loyaltyPoints');
    }

    public function program()
    {
      $classes = DB::table('programs')
                  ->join('classes','programs.id','=','classes.program_id')
                  ->select('programs.name','classes.*')->get();

         return view('web.program',['results' => $results]);
    }

    public function store()
    {
      return view('web.store');

    }
    public function contact()
    {
          return view('web.contact');
    }
    public function singleprogram()
    {
      return view('web.singleprogram');

    }
    public function singleclass()
    {
      return view('web.singleclass');
    }

    public function viewItem()
    {
      return view('web.viewItem');

    }
    public function viewGift()
    {
      return view('web.viewGift');
    }    
    public function loyalty()
    {
      return view('web.loyalty');

    }
    public function gifts()
    {
      return view('web.gifts');

    }
    public function terms(){
      return view('web.terms');
    }

    public function myOrder()
    {
      return view('web.myOrder');

    }
    public function history()
    {
      return view('web.history');

    }
    public function help()
    {

      $results = DB::table('faqs')->get();

      return view('web.help', [ 'results' => $results]);

    }
    public function changepass()
    {
      return view('web.changepass');

    }
    public function buyCredits()
    {
      return view('web.buyCredits');

    }
    public function accountDetails()
    {
      return view('web.accountDetails');

    }
    public function editProfile()
    {
      $user = DB::table('users')->where('id', '=', session('usr_id'))->first();

      return view('web.editProfile', ['user' => $user]);

    }
    public function resetpassword()
    {
      return view('web.resetpassword');
    }
    public function verifyAccount1()
    {
      return view('web.verifyAccount1');
    }
    public function verifyPass()
    {
      return view('web.verifyPass');
    }
    public function verifyAccount2()
    {
      return view('web.verifyAccount2');
    }
    public function paymentMethod()
    {
      return view('web.paymentMethod');
    }

    public function adminLogin(){
      return view('web.admin.login');
    }

    public function adminDashboard(){
      return view('web.admin.dashboard');
    }
    public function addCompany(){
      $results = DB::table('districts')->get();
      
      return view('web.admin.addCompany', ['results' => $results]);
    }
    public function addDistrict(){
      return view('web.admin.addDistrict');
    }
    public function addCategory(){
      return view('web.admin.addCategory');
    }
    public function addcoupon(){
      return view('web.admin.addcoupon');
    }
    public function addVoucher(){
      return view('web.admin.addVoucher');
    }
    public function addProduct(){
      return view('web.admin.addProduct');
    }
    public function addClass(){
      $results = DB::table('categories')->get();
      $programs = DB::table('programs')->get();
      return view('web.admin.addClass',[
        'results' => $results,
        'programs' => $programs
        ]);
    }
    public function addFAQ(){
      return view('web.admin.addFAQ');
    }
    public function addProgram(){
      return view('web.admin.addProgram');
    }
    public function manageCompany(){
      $results = DB::table('companies')
                    ->join('districts','companies.district_id','=','districts.id')
                    ->select('companies.*', 'districts.name as district')->paginate(10);
      return view('web.admin.manageCompany', ['results' => $results]);
    }
    public function manageCategory(){
      $results = DB::table('categories')->paginate(10);
      return view('web.admin.manageCategories', ['results' => $results]);
    }
    public function manageClass(){
      $results = DB::table('classes')->paginate(10);

      return view('web.admin.manageClasses', ['results' => $results]);
    }
    public function manageProduct(){
      $results = DB::table('products')->paginate(10);

      return view('web.admin.manageProducts', ['results' => $results]);
    }
    public function manageNews(){
      $results = DB::table('news')->paginate(10);
      return view('web.admin.manageNews', ['results' => $results]);
    }
    public function manageDistricts(){
      $results = DB::table('districts')->paginate(10);
      return view('web.admin.manageDistricts', ['results' => $results]);
    }
    public function manageCoupons(){
      $results = DB::table('coupons')->paginate(10);

      return view('web.admin.manageCoupons', ['results' => $results]);
    }
    public function manageVouchers(){
      $results = DB::table('vouchers')->paginate(10);

      return view('web.admin.manageVouchers', ['results' => $results]);
    }
    public function manageFAQs(){
      $results = DB::table('faqs')->paginate(10);

      return view('web.admin.manageFAQS', ['results' => $results]);
    }
    public function addNews(){
      return view('web.admin.addNews');
    }
}
