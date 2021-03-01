<?php 

namespace App\Mail;

use Illuminate\Support\Facades\Mail;

/**
 * Class to send Email through SendGrid API
 */
class Email {

    public static function to(array $emailData) {
        
        $email = new \SendGrid\Mail\Mail();        
        $email->setFrom($emailData['from']);
        $email->setSubject($emailData['subject']);                
        $email->addTo($emailData['to']);
        $email->addContent(
            "text/" . $emailData['content-type'], 
            $emailData['content']
        );

        $sendgrid = new \SendGrid("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");

        try {
            $response = $sendgrid->send($email);

        } catch (Exception $e) { 
             $e->getMessage() ."\n";
        }        
    }
}