<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //

    public function signup(Request $request)
    {

        $request->validate([
            'fullname' => 'required|max:100',
            'email' => 'required|max:191',
            'company_id' => 'required|max:100',
            'phone' => 'required|min:8,max:13',
            'permit' => 'required|max:30',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);


        return view('web.terms', [
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

    public function sign(Request $request)
    {

        return view('web.terms', [
            'name' => $request->fullname,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'workpermit' => $request->permit,
            'password' => md5($request->password),
        ]);
    }

    public function terms(Request $request)
    {

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

        return redirect('login')->with('success', 'Account created successfully. Login Now!');

    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|max:191',
            'password' => 'required|min:6'
        ]);

        $results = DB::table('users')
            ->where('email', $request->username)
            ->where('password', md5($request->password))->first();


        if (!empty($results)) {
            session(['userst' => 'logged', 'name' => $results->name, 'usr_id' => $results->id]);
            $cid = $request->cid;

            if ($cid > 0) {
                return redirect('singleprogram/' . $cid);
            } else {
                return redirect('dashboard')->with('status', 'Logged in successfully.');
            }
        } else {
            return redirect('login')->with('status', 'Login failed! Username or password is wrong.');
        }
    }

    public function signout(Request $request)
    {
        $request->session()->flush();

        return redirect('/');
    }

    public function contactus(Request $request)
    {
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

    public function editProfile(Request $request)
    {
        if ($request->session()->has('usr_id')) {

            $id = $request->session()->get('usr_id');

            $request->validate([

                'name' => 'max:100',
                'phone' => 'max:13',
                'email' => 'max:191'
            ]);

            if (isset($request->gender)) {


                $gender = $request->get('gender');
                DB::table('users')->where('id', '=', $id)->update([
                    'salutation' => $gender
                ]);

            }
            if (isset($request->name)) {

                DB::table('users')->where('id', '=', $id)->update([
                    'name' => $request->name
                ]);

            }
            if (isset($request->phone)) {

                DB::table('users')->where('id', '=', $id)->update([
                    'phone' => $request->phone,
                    'phonestatus' => 0
                ]);

            }
            if (isset($request->email)) {

                DB::table('users')->where('id', '=', $id)->update([
                    'email' => $request->email,
                    'emailstatus' => 0
                ]);

            }

            return redirect('editProfile')->with('status', 'The profile infromation has been updated successfully.');

        } else {
            return redirect('login');
        }
    }

    public function changePass(Request $request)
    {

        if ($request->session()->has('usr_id')) {

            $request->validate([
                'opass' => 'required|min:6',
                'npass' => 'required|min:6|required_with:cpass|same:cpass',
                'cpass' => 'min:6'
            ]);

            $result = DB::table('users')
                ->where('id', '=', $request->session()->get('usr_id'))
                ->where('password', '=', md5($request->opass))->first();

            if (!empty($result)) {

                DB::table('users')->where('id', '=', $request->session()->get('usr_id'))->update([
                    'password' => md5($request->npass)
                ]);
                return redirect('changepass')->with('status', "Password changed successfully");

            } else {
                return redirect('changepass')->with('wrong', 'Old password is wrong.');
            }

        } else {
            return redirect('login');
        }
    }


    public function radeem_now(Request $request)
    {
        if ($request->session()->has('usr_id')) {
            $users = DB::table('users')
                ->where('id', '=', $request->session()->get('usr_id'))
                ->first();

            if ($users->loyaltyPoints >= $request->product_points) {

                $updated_points = $users->loyaltyPoints - $request->product_points;
                DB::table('users')->update([
                    'loyaltyPoints' => $updated_points
                ]);


                $result = DB::table('orders')
                    ->insert([
                        'type' => 'point',
                        'user_id' => $request->session()->get('usr_id'),
                        'status' => 'Pending',
                        'product_id' => $request->product_id
                    ]);


                return redirect()->back()->with('status', "you have successfully purchase product!.");
            } else {
                return redirect()->back()->with('status', "You don't have enough points to buy this product choose another.");
            }
        } else {
            return redirect()->back()->with('status', "First go to login then redeem product");
        }

    }

    public function addToCart(Request $request)
    {

        if ($request->session()->has('usr_id')) {

            $quantity = 1;
            if (!empty($request->quantity)) {

                $quantity = $request->quantity;
            }
            $orderID = "";
            $check = DB::table('orders')
                ->where('user_id', '=', $request->session()->get('usr_id'))
                ->where('status', '=', 'started')->first();

            if (!empty($check)) {
                $orderID = $check->id;
            } else {

                $orderID = DB::table('orders')->insertGetId([
                    'user_id' => $request->session()->get('usr_id'),
                    'type' => 'product',
                    'status' => 'started'
                ]);
            }

            $proC = DB::table('carts')
                ->where('order_id', '=', $orderID)
                ->where('product_id', '=', $request->product_id)->first();

            if (!empty($proC)) {
                if (!empty($request->quantity)) {
                    DB::table('carts')->update([
                        'quantity' => $proC->quantity + $quantity
                    ]);
                } else {
                    DB::table('carts')->update([
                        'quantity' => $proC->quantity + 1
                    ]);

                }
            } else {
                DB::table('carts')->insert([
                    'order_id' => $orderID,
                    'product_id' => $request->product_id,
                    'quantity' => $quantity
                ]);

            }


            return redirect()->back()->with('status', 'Added to cart successfully.');

        } else {
            return redirect('login');
        }
    }

    public function changeQuantity()
    {
        $cart_id = $_GET['cart_id'];
        $quantity = $_GET['quantity'];

        $result = DB::table('carts')->where('id', '=', $cart_id)->update([
            'quantity' => $quantity
        ]);

        if ($result) {
            return response()->json(array('CODE' => '1', 'TITLE' => 'SUCCESS: ', 'DETAIL' => 'Your cart quantity update successfully'), 200);

        } else {
            return response()->json(array('CODE' => '0', 'TITLE' => 'SORRY: ', 'DETAIL' => 'Something went wrong please try again later!'), 200);
        }

    }

    public function postOrder(Request $request)
    {
        try {
            if ($request->order_id == 0 || $request->cart_id == 0) {
                return redirect()->back()->with('error', 'You dont have more products for order first you must add product to cart.!');
            }
//            $paymentMethod = $request->paymentMethod;

            $result = DB::table('orders')
                ->where('id', '=', $request->order_id)
                ->update([
                    'sub_total' => $request->sub_total,
                    'shipping_charges' => $request->shipping_charges,
                    'discount' => $request->discount,
                    'total' => $request->total,
                    'cart_id' => $request->cart_id,
                    'status' => 'Pending',

                    'name' => $request->name,
                    'contact' => $request->contact,
                    'address' => $request->address,

                    'cc_name' => $request->cc_name,
                    'cc_number' => $request->cc_number,
                    'cc_expiration' => $request->cc_expiration,
                    'cc_cvv' => $request->cc_cvv
                ]);

            DB::table('carts')->delete();


            if ($result) {
                return redirect()->back()->with('status', 'ORDER SAVE SUCESSFULLY.!');
            } else {
                return redirect()->back()->with('error', 'something went wrong please try again later.');
            }

        } catch (Exception $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }

    }


    public function deleteCart()
    {
        $cart_id = $_GET['cart_id'];

        $result = DB::table('carts')
            ->where('id', '=', $cart_id)
            ->delete();

        if ($result) {
            return response()->json(array('CODE' => '1', 'TITLE' => 'SUCCESS: ', 'DETAIL' => 'Your cart delete successfully'), 200);

        } else {
            return response()->json(array('CODE' => '0', 'TITLE' => 'SORRY: ', 'DETAIL' => 'Something went wrong please try again later!'), 200);
        }

    }


    public function reserve_class(Request $request)
    {

        if ($request->session()->has('usr_id')) {

            try {

                $result = DB::table('reserve_classes')
                    ->insert([
                        'class_id' => $request->class_id,
                        'user_id' => $request->session()->get('usr_id'),
                    ]);

                if ($result) {
                    $user_point_res = DB::table('users')->where('id', '=', $request->session()->get('usr_id'))->first();
                    $class_point_res = DB::table('classes')->where('id', '=', $request->class_id)->first();

                    $points = $user_point_res->loyaltyPoints + $class_point_res->loyaltyPoints;
                    DB::table('users')
                        ->where('id', '=', $request->session()->get('usr_id'))
                        ->update([
                            'loyaltyPoints' => $points
                        ]);


                    return redirect()->back()->with('status', 'Class reserved successfully .!');
                } else {
                    return redirect()->back()->with('error', 'something went wrong please try again later.');
                }

            } catch (Exception $ex) {
                return redirect()->back()->with('error', $ex->getMessage());
            }

        } else {
//            return redirect()->back()->with('error', 'First you go to login then reserve classes.');
            return redirect('login/?cid=' . $request->class_id);
        }

    }


    public function mark_attendance(Request $request)
    {
        $c_date = date("Y-m-d");
//        $c_date = '2019-06-25';


        if ($request->session()->has('usr_id')) {
            try {

                $chk_session = DB::table('sessions')
                    ->where('class_id', '=', $request->class_id)
                    ->where('date', '=', $c_date)
                    ->get();

                if ($chk_session && count($chk_session) > 0) {


                    $chk_atdc = DB::table('attendance')
                        ->where('class_id', '=', $request->class_id)
                        ->where('current_date', '=', $c_date)
                        ->get();

                    if ($chk_atdc && count($chk_atdc) > 0) {
                        return redirect()->back()->with('status', 'Your today attendance is already marked.!');
                    } else {
                        $result = DB::table('attendance')
                            ->insert([
                                'class_id' => $request->class_id,
                                'current_date' => $c_date,
                                'user_id' => $request->session()->get('usr_id'),
                            ]);

                        if ($result) {
                            return redirect()->back()->with('status', 'Your attendance mark successfully .!');
                        } else {
                            return redirect()->back()->with('error', 'Something went wrong please try again later.');
                        }
                    }


                } else {
                    return redirect()->back()->with('status', 'This class has not session today!');
                }


            } catch (Exception $ex) {
                return redirect()->back()->with('error', $ex->getMessage());
            }

        } else {
            return redirect()->back()->with('error', 'First you go to login then mark attendance.');
        }

    }

    public function reset_password(Request $request)
    {
        $email = $request->email;
        $newpassword = $request->Newpassword;
        $conpassword = $request->Conpassword;
        if ($newpassword == $conpassword) {

            DB::table('users')->where('email', '=', $email)->update([
                'password' => md5($newpassword),
                'otp_code' => ''
            ]);
            return redirect('/login')->with('success', 'Your password changed successfully you can login now.');

        } else {
            return redirect()->back()->with('error', 'Your password do not matched.');
        }
    }


}
 