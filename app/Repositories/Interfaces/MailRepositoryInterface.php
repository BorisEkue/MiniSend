<?php

namespace App\Repositories\Interfaces;


interface MailRepositoryInterface {

     public function saveMail(array $mail);

     public function findMailById($idMail);

     public function findMailByCustomer($emailCustomer,  $offset, $size);

     public function findMailToCustomer($emailCustomer, $offset, $size);

     public function search($query);
    
}