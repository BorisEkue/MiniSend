<?php

namespace App\Repositories;

use App\Repositories\Interfaces\MailRepositoryInterface;
use App\Models\Email;
use App\Models\FileAttached;



class MailRepository implements MailRepositoryInterface {

    public function saveMail(array $emailData) {   

        $email = new Email();

        $email->id = $emailData["id"];
        $email->idMail = $emailData["id"];
        $email->from = $emailData["from"];
        $email->to = $emailData["to"];
        $email->cc = $emailData["cc"];
        $email->subject = $emailData["subject"];
        $email->content = $emailData["content"];
        $email->content_type = $emailData["content-type"];
        $email->has_files = $emailData["hasFilesAttached"] ;

        $files = array();
        
        if($email->has_files) {
            
            foreach($emailData["filesAttached"] as $file) {
                
                $fileAttached = new \App\Models\FileAttached();
                
                $fileAttached->id = $file["id"];
                $fileAttached->fileName = $file["fileName"];
                $fileAttached->filePath = $file["filePath"];
                $fileAttached->fileExtension = $file["fileExtension"];
                $fileAttached->email_id = $file["idEmail"];
                $fileAttached->idFile = $file["id"];
                
                $files[] = $fileAttached;
                                
                $fileAttached->save();
            }
        }

        $email->save();
        
        $email->filesAttached = $files;

        
        
        return $email;
    }

    public function findMailById($idMail) {
        return Email::Where('id', $idMail)->first();  
    }

    public function findMailByCustomer($emailCustomer, $offset, $size) {
        return Email::Where('from', $emailCustomer)->orderBy('created_at', 'DESC')->skip($offset)->take($size)->get();         
    }

    public function findMailToCustomer($emailCustomer, $offset, $size) {
        return Email::Where('to', $emailCustomer)->orderBy('created_at', 'DESC')->skip($offset)->take($size)->get();         
    }


    public function search($query) {
        return Email::Where($query)->get();
    }
}