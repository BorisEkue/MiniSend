<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Services\Interfaces\MailServiceInterface;
use App\Mail\Email;


class MailService implements MailServiceInterface {

    private CustomerRepositoryInterface $customerRepositoryIterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryIterface)
    {
        $this->customerRepositoryIterface = $customerRepositoryIterface;
    }

    public function sendMail(array $mail)
    {
        Email::to(array());
    }   
}