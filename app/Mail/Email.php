<?php 

namespace App\Mail;

use Illuminate\Support\Facades\Mail;


//require '..\..\vendor\autoload.php';



class Email {

    public static function to(array $emailData) {

        $email = new \SendGrid\Mail\Mail();
        //$email->setFrom("kueviboris@gmail.com", "");
        $email->setFrom("kueviboris@gmail.com");
        $email->setSubject("Bienvenue sur Ici AFRICA");
        //$email->addTo("kueviboris@gmail.com", "");
        $email->addTo("kueviboris@gmail.com");

        $email->addContent(
            "text/html", "Hello"
        );
        $sendgrid = new \SendGrid("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");


        try {
            $response = $sendgrid->send($email);
           
           
        } catch (Exception $e) { 
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        
    }
}