<?php

namespace App\Services\Interfaces;


interface MailServiceInterface {

    public function sendMail(array $mail);

    public function findMailById($idMail);

    public function findMailByCustomer($emailCustomer, $offset = 0, $size = 10);

    public function findMailToCustomer($emailCustomer, $offset = 0, $size = 10);

    public function search($query);
}