<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use App\User;
use Illuminate\Support\Facades\DB;

class QrController extends Controller
{
    public function attendance_form(Request $request)
    {
        return view('web.attendance');
    }

    public function index(Request $request)
    {

        return view('auth.QrLogin');
    }

    public function indexoption2(Request $request)
    {
        return view('auth.QrLogin2');
    }

    public function ViewUserQrCode($value = '', Request $request)
    {
        $user_id = $request->session()->get('usr_id');
        $result = DB::table('users')
            ->where('id', '=', $user_id)->first();

        return view('web.viewqrcode', ['result' => $result]);
    }

    public function checkUser(Request $request)
    {
        try {
            $result = 0;
            $c_date = date("Y-m-d");
            $time_from = date('h:i:s', time());
//            $c_date = '2019-06-25';
            $chk_user = DB::table('users')
                ->where('QRpassword', '=', $request->data)
                ->first();


            if (!empty($chk_user)) {

                $chk_session = DB::table('sessions')
//                    ->where('class_id', '=', $request->class_id)
                    ->where('date', '=', $c_date)
                    ->where('time', '>=', $time_from)
                    ->get();


                if ($chk_session && count($chk_session) > 0) {

                    $chk_atdc = DB::table('attendance')
//                        ->where('class_id', '=', $request->class_id)
                        ->where('current_date', '=', $c_date)
                        ->get();

                    if ($chk_atdc && count($chk_atdc) > 0) {
                        $result = 1;
//                        return redirect()->back()->with('status', 'Your today attendance is already marked.!');
                    } else {
                        $result = DB::table('attendance')
                            ->insert([
//                                'class_id' => $request->class_id,
                                'current_date' => $c_date,
                                'user_id' => $chk_user->id,
                            ]);

                        if ($result) {
                            $result = 2;
//                            return redirect()->back()->with('status', 'Your today attendance mark successfully .!');
                        } else {
                            $result = 0;
//                            return redirect()->back()->with('error', 'Something went wrong please try again later.');
                        }
                    }


                } else {
                    $result = 3;
//                    return redirect()->back()->with('status', 'This class has not session today!');
                }

//                $result = 1;
//                return view('web.attendance')->with('status', 'Your Attendance marked successfully!');

            } else {
                $result = 4;
//                return view('web.attendance')->with('error', 'Your QR code is not correct!');
            }

        } catch (Exception $ex) {
            $result = 0;
//            return redirect()->back()->with('error', $ex->getMessage());
        }

        return $result;

//        $result = 0;
//        if ($request->data) {
//            $user = User::where('QRpassword', $request->data)->first();
//            if ($user) {
//                Sentinel::authenticate($user);
//                $result = 1;
//            } else {
//                $result = 0;
//            }
//        }
//        return $result;
    }

    public function QrAutoGenerate(Request $request)
    {
        $QRpassword = bcrypt(str_random(40));
        $user_id = $request->user_id;

        DB::table('users')
            ->where('id', '=', $user_id)->first();

        DB::table('users')
            ->where('id', '=', $user_id)
            ->update([
                'QRpassword' => $QRpassword
            ]);

        return redirect('wh-manageUsers')->with('status', 'Qr code created successfully!');


//        $file_name = rand(pow(10, 7 - 1), pow(10, 7) - 1);
//        $file_name = $file_name . '.png';

//        \QrCode::size(500)
//            ->format('png')
//            ->generate('ItSolutionStuff.com', public_path('qrcode_img/' . $file_name));


//        $QRpassword = bcrypt($existing_img->email . str_random(40));
//        $QRpassword = bcrypt($existing_img->personal_number . $existing_img->email . str_random(40));

//        $target_dir = public_path() . '/qrcode_img/';
//        unlink($target_dir . $existing_img->QRimg);

//        if (file_exists("'".$target_dir."'" . $existing_img->QRimg)) {
//            unlink($target_dir . $existing_img->QRimg);
//        }


//        return view('web.viewqrcode', [
//            'result' => $result,
//            'status' => 'Your Qr code changed successfully!'
//        ]);
//            ->with('status', 'Your Qr code changed successfully!');
    }


    public function CreateReservedClassesQrcode(Request $request)
    {
        $QRpassword = bcrypt(str_random(40));
        $res_class_id = $request->res_class_id;

        DB::table('reserve_classes')
            ->where('id', '=', $res_class_id)->first();

        DB::table('reserve_classes')
            ->where('id', '=', $res_class_id)
            ->update([
                'QRpassword' => $QRpassword
            ]);

        return redirect('wh-manageReservedClasses')->with('status', 'Qr code created successfully!');

    }


    public function checkClassAttendance(Request $request)
    {
        try {
            $user_id = $request->session()->get('usr_id');
            $result = 0;
            $c_date = date("Y-m-d");
//            $time_from = date('h:i:s', time());
            $time_from = date("H:i:s");
//            $c_date = '2019-07-12';

            $chk_class = DB::table('classes')
                ->where('QRpassword', '=', $request->data)
                ->first();
            $duration = $chk_class->duration;
            $time_to = date("H:i:s", strtotime('+' . $duration . ' hours'));


            if (!empty($chk_class)) {

                $chk_res_class = DB::table('reserve_classes')
                    ->where('class_id', '=', $chk_class->id)
                    ->where('user_id', '=', $user_id)
                    ->get();

                if ($chk_res_class && count($chk_res_class) > 0) {

                    $chk_session = DB::table('sessions')
                        ->where('class_id', '=', $chk_class->id)
                        ->where('date', '=', $c_date)
                        ->where('time', '>=', $time_from)
                        ->where('time', '<=', $time_to)
                        ->get();


                    if ($chk_session && count($chk_session) > 0) {

                        $chk_atdc = DB::table('attendance')
                            ->where('class_id', '=', $chk_class->id)
                            ->where('user_id', '=', $user_id)
                            ->where('current_date', '=', $c_date)
                            ->get();

                        if ($chk_atdc && count($chk_atdc) > 0) {
                            $result = 1;
//                        return redirect()->back()->with('status', 'Your today attendance is already marked.!');
                        } else {
                            $result = DB::table('attendance')
                                ->insert([
                                    'current_date' => $c_date,
                                    'user_id' => $user_id,
                                    'class_id' => $chk_class->id,

                                ]);

                            if ($result) {
                                $result = 2;
//                            return redirect()->back()->with('status', 'Your today attendance mark successfully .!');
                            } else {
                                $result = 0;
//                            return redirect()->back()->with('error', 'Something went wrong please try again later.');
                            }
                        }


                    } else {
                        $result = 3;
//                    return redirect()->back()->with('status', 'This class has not session today!');
                    }
                } else {
                    $result = 5;
//                    return redirect()->back()->with('status', 'This class is not reserved!');
                }

//                $result = 1;
//                return view('web.attendance')->with('status', 'Your Attendance marked successfully!');

            } else {
                $result = 4;
//                return view('web.attendance')->with('error', 'Your QR code is not correct!');
            }

        } catch (Exception $ex) {
            $result = 0;
//            return redirect()->back()->with('error', $ex->getMessage());
        }

        return $result;
    }

}