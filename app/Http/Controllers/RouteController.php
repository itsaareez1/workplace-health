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

      $classes = DB::table('classes')
                    ->select('classes.*')
                    ->orderBy(DB::raw('RAND()'))
                    ->take(10)
                    ->get();

      $products = DB::table('products')
                      ->select('products.*')
                      ->where('type','=','1')
                      ->orderBy(DB::raw('RAND()'))
                      ->take(9)
                      ->get();
                     
     $news = DB::table('news')
                      ->select('news.*')
                      ->where('type','=','general')
                      ->orderBy(DB::raw('RAND()'))
                      ->take(9)
                      ->get();
                 
        return view('welcome', ['products' => $products, 'classes' => $classes, 'news' => $news]);
    }
    public function index(Request $request)
    {
      if ($request->session()->has('userst'))
      {
        $products = DB::table('products')
        ->select('products.*')
        ->where('type','=','1')
        ->orderBy(DB::raw('RAND()'))
        ->take(9)
        ->get();

        $news = DB::table('news')
        ->join('companies','companies.id','=','news.company_id')
        ->join('users','users.company_id','companies.ids')
        ->select('news.*')
        ->where('news.type','=','specific')
        ->orderBy(DB::raw('RAND()'))
        ->take(9)
        ->get();
   
        return view('web.index', [
          'products' => $products,
          'news' => $news,
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
      $products = DB::table('products')->where('type','=','1')->paginate(9);
      return view('web.store', ['products' => $products]);

    }
    public function contact()
    {

      $results = DB::table('contactinfo')->first();
          return view('web.contact', ['result' => $results]);
    }
    public function singleprogram(Request $request){
      $class = DB::table('classes')
                    ->join('categories','categories.id','=','classes.category_id')
                    ->select('classes.*','categories.name as category')
                    ->where('classes.id', '=', $request->id)->first();

      return view('web.singleprogram', ['class' => $class]);
    }
    public function singleclass()
    {
      return view('web.singleclass');
    }

    public function viewItem(Request $request)
    {
      $product = DB::table('products')
                 ->where('id','=',$request->id)->first();

      return view('web.viewItem', ['product' => $product]);

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
      return view('web.admin.addCoupon');
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
      $companies = DB::table('companies')->get();
      return view('web.admin.addProgram',['companies' => $companies]);
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
      $companies = DB::table('companies')->get(); 
      return view('web.admin.addNews',['companies' => $companies]);
    }
}
