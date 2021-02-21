<?php 

namespace App\Mail;

use Illuminate\Support\Facades\Mail;
use Monolog\Handler\SendGridHandler;

//require '..\..\vendor\autoload.php';



class Email {

    public static function to(array $emailData) {

        // $email = new \SendGrid\Mail\Mail();
        // $email->setFrom("kueviboris@gmail.com", "");
        // $email->setSubject("Bienvenue sur Ici AFRICA");
        // $email->addTo("kuviboris@gmail.com", "");

        // $email->addContent(
        //     "text/html", "Hello"
        // );
        // $sendgrid = new \SendGrid("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");
        // try {
        //     $response = $sendgrid->send($email);
           
        // } catch (Exception $e) { 
        //     // echo 'Caught exception: '. $e->getMessage() ."\n";
        // }

        
    }
}