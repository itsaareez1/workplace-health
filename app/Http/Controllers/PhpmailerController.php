<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use Request;

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;

class PhpmailerController extends Controller
{
    public $sender_email = 'demoproject005@gmail.com';
    public $sender_email_pwd = 'ioitsol123456';


    public function radeem_now_coupon(Request $request)
    {
        if ($request->user_id > 0) {
            $users = DB::table('users')
                ->where('id', '=', $request->user_id)
                ->first();

            if ($users->loyaltyPoints >= $request->product_points) {


                $to_mail = $users->email;
                $message = 'Your coupon code is: (' . $request->code . ') For this product (' . $request->product_name . ')';

//        return $request->to_mail;
                // is method a POST ?
//        if (Request::isMethod('post')) {
//            require 'vendor/autoload.php';                                                    // load Composer's autoloader

                $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

                try {
                    // Server settings
                    $mail->SMTPDebug = 0;                                    // Enable verbose debug output
                    $mail->isSMTP();                                        // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                                                // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                                // Enable SMTP authentication
                    $mail->Username = $this->sender_email;             // SMTP username
                    $mail->Password = $this->sender_email_pwd;              // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom($this->sender_email, 'Workplace Health');
                    $mail->addAddress($to_mail, '');    // Add a recipient, Name is optional
                    $mail->addReplyTo($this->sender_email, '');
                    $mail->addCC($to_mail);
                    $mail->addBCC($to_mail);

                    //Attachments (optional)
                    // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

                    //Content
                    $mail->isHTML(true);                                                                    // Set email format to HTML
                    $mail->Subject = 'coupon code';
                    $mail->Body = $message;                        // message

                    $mail->send();


                    $updated_points = $users->loyaltyPoints - $request->product_points;
                    DB::table('users')->update([
                        'loyaltyPoints' => $updated_points
                    ]);

                    return redirect()->back()->with('status', "Redeem successfully please check your email!.");
//                    return back()->with('success', 'Message has been sent!');
                } catch (Exception $e) {
                    return redirect()->back()->with('status', "Redeem unsuccessfully something went wrong please try again later.!.");
//                    return back()->with('error', 'Message could not be sent.');
                }
//        }
//        return view('phpmailer');


            } else {
                return redirect()->back()->with('status', "You don't have enough points to buy this product choose another.");
            }
        } else {
            return redirect()->back()->with('status', "First go to login then redeem product");
        }
    }


    public function radeem_now_voucher(Request $request)
    {
        if ($request->user_id > 0) {
            $users = DB::table('users')
                ->where('id', '=', $request->user_id)
                ->first();


            // return $users->loyaltyPoints;
            // return ['users',$users];

            if ($users->loyaltyPoints >= $request->product_points) {


                $to_mail = $users->email;
                $message = 'Your voucher code is: (' . $request->code . ') For this product (' . $request->product_name . ')';

//        return $request->to_mail;
                // is method a POST ?
//        if (Request::isMethod('post')) {
//            require 'vendor/autoload.php';                                                    // load Composer's autoloader

                $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

                try {
                    // Server settings
                    $mail->SMTPDebug = 0;                                    // Enable verbose debug output
                    $mail->isSMTP();                                        // Set mailer to use SMTP
                    $mail->Host = 'smtp.gmail.com';                                                // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                                // Enable SMTP authentication
                    $mail->Username = $this->sender_email;             // SMTP username
                    $mail->Password = $this->sender_email_pwd;              // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    //Recipients
                    $mail->setFrom($this->sender_email, 'Workplace Health');
                    $mail->addAddress($to_mail, '');    // Add a recipient, Name is optional
                    $mail->addReplyTo($this->sender_email, '');
                    $mail->addCC($to_mail);
                    $mail->addBCC($to_mail);

                    //Attachments (optional)
                    // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

                    //Content
                    $mail->isHTML(true);                                                                    // Set email format to HTML
                    $mail->Subject = 'Voucher';
                    $mail->Body = $message;                        // message

                    $mail->send();

                    $updated_points = $users->loyaltyPoints - $request->product_points;
                    DB::table('users')->update([
                        'loyaltyPoints' => $updated_points
                    ]);

                    return redirect()->back()->with('status', "Redeem successfully please check your email!.");
//                    return back()->with('success', 'Message has been sent!');
                } catch (Exception $e) {
                    return redirect()->back()->with('status', "Redeem unsuccessfully something went wrong please try again later.!." . $e->getMessage());
//                    return back()->with('error', 'Message could not be sent.');
                }
//        }
//        return view('phpmailer');


            } else {
                return redirect()->back()->with('status', "You don't have enough points to buy this product choose another.");
            }
        } else {
            return redirect()->back()->with('status', "First go to login then redeem product");
        }
    }


    public function sendEmail(Request $request)
    {
//        return $request->to_mail;
        // is method a POST ?
//        if (Request::isMethod('post')) {
//            require 'vendor/autoload.php';                                                    // load Composer's autoloader

        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        try {
            // Server settings
            $mail->SMTPDebug = 0;                                    // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                                                // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                // Enable SMTP authentication
            $mail->Username = $this->sender_email;             // SMTP username
            $mail->Password = $this->sender_email_pwd;              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($this->sender_email, 'Workplace Health');
            $mail->addAddress($request->to_mail, '');    // Add a recipient, Name is optional
            $mail->addReplyTo($this->sender_email, '');
            $mail->addCC($request->to_mail);
            $mail->addBCC($request->to_mail);

            //Attachments (optional)
            // $mail->addAttachment('/var/tmp/file.tar.gz');			// Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');	// Optional name

            //Content
            $mail->isHTML(true);                                                                    // Set email format to HTML
            $mail->Subject = $request->subject;
            $mail->Body = $request->message;                        // message

            $mail->send();

            DB::table('contactus')
                ->where('id', '=', $request->update_id)
                ->update([
                    'state' => 2
                ]);

            return back()->with('success', 'Message has been sent!');
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent.');
        }
//        }
//        return view('phpmailer');
    }

    public function resetAdminPassword(Request $request)
    {
        $chk_email = DB::table('admins')
            ->where('email', '=', $request->to_mail)
            ->first();


        if (!$chk_email) {
            return back()->with('error', 'Sorry your information is not correct.');
        }

        $digits = 7;
        $password = rand(pow(10, $digits - 1), pow(10, $digits) - 1);

        $mail = new PHPMailer(true);                            // Passing `true` enables exceptions

        try {
            // Server settings
            $mail->SMTPDebug = 0;                                    // Enable verbose debug output
            $mail->isSMTP();                                        // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                                                // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                                // Enable SMTP authentication
            $mail->Username = $this->sender_email;             // SMTP username
            $mail->Password = $this->sender_email_pwd;              // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom($this->sender_email, 'Workplace Health');
            $mail->addAddress($request->to_mail, '');    // Add a recipient, Name is optional
            $mail->addReplyTo($this->sender_email, '');
            $mail->addCC($request->to_mail);
            $mail->addBCC($request->to_mail);

            //Content
            $mail->isHTML(true);                                                                    // Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body = 'Your New Password is ' . $password;                        // message

            $mail->send();

            DB::table('admins')
                ->where('email', '=', $request->to_mail)
                ->update([
                    'password' => md5($password)
                ]);

            return back()->with('success', 'Your password updated successfully please check you email!');
        } catch (Exception $e) {
            return back()->with('error', 'Sorry your information is not correct.');
        }
    }
}