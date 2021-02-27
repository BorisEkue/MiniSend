<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Repositories\Interfaces\MailRepositoryInterface;
use App\Services\Interfaces\MailServiceInterface;
use App\Mail\Email;


class MailService implements MailServiceInterface {

    private CustomerRepositoryInterface $customerRepositoryIterface;
    private MailRepositoryInterface $mailRepositoryInterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryIterface, MailRepositoryInterface $mailRepositoryInterface)
    {
        $this->customerRepositoryIterface = $customerRepositoryIterface;
        $this->mailRepositoryInterface = $mailRepositoryInterface;
    }


    public function sendMail(array $mail)
    {
        // Send mail with sendgrid
        Email::to($mail); 

        // Store mail in database
        return $this->mailRepositoryInterface->saveMail($mail);
        
    }   

    public function findMailById($idMail) {
        return $this->mailRepositoryInterface->findMailById($idMail);
    }

    public function findMailByCustomer($emailCustomer, $offset = 0, $size = 10) {
        
        return $this->mailRepositoryInterface->findMailByCustomer($emailCustomer, $offset, $size);
    }

    public function findMailToCustomer($emailCustomer, $offset = 0, $size = 10) {
        
        return $this->mailRepositoryInterface->findMailToCustomer($emailCustomer, $offset, $size);
    }

    public function search($query) {
        return $this->mailRepositoryInterface->search($query);
    }

    
}