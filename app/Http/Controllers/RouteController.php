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
        return view('web.program');
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
      return view('web.editProfile');

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


}
