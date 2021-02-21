<?php

namespace App\Http\Controllers;

use App\Http\APIResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Services\Interfaces\MailServiceInterface;


class MailController extends Controller
{
    private CustomerServiceInterface $customerServiceInterface;
    private MailServiceInterface $mailServiceInterface;
    
    public function __construct(CustomerServiceInterface $customerServiceInterface, MailServiceInterface $mailServiceInterface)
    {
        $this->middleware('basicAuth');
        $this->customerServiceInterface = $customerServiceInterface;
        $this->mailServiceInterface = $mailServiceInterface;
    }

    public function sendMail(Request $request) {
        echo $request["from"];
    }

    public function ok() {
        $this->mailServiceInterface->sendMail(array());
    }


    
    
}
