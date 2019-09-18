<?php

namespace App;

use Illuminate\Notifications\Notifiable;
//use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
//use DB;
use Auth;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\DB;

class Mailer extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    public $sender_email = 'demoproject005@gmail.com';
    public $sender_email_pwd = 'ioitsol12345';

    use Authenticatable, CanResetPassword;

    use Notifiable;

    public function SEND_MAIL($to_mail, $subject, $body)
    {

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

            //Content
            $mail->isHTML(true);                                                                    // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $body;                        // message

            $mail->send();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

}
