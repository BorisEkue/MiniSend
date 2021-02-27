<?php

namespace App\Http\Controllers;

use App\Http\APIResponse;
use App\Services\Interfaces\CustomerServiceInterface;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;


class CustomerController extends Controller
{
    private CustomerServiceInterface $customerService;

    public function __construct(CustomerServiceInterface $customerService)
    {
       // $this->middleware('preFlight');
        $this->middleware('basicAuth')->except('login'); 
        $this->customerService = $customerService;
    }


    public function login(Request $request) {
        
        $data = $request->input();       
        
        
        if(!isset($data['email']) || $data['email'] == '')
            return APIResponse::error($request, "'login' can't be empty", Response::HTTP_UNAUTHORIZED);

        if(!isset($data['password']) || $data['password'] == '')
            return APIResponse::error($request, "'password' can't be empty", Response::HTTP_UNAUTHORIZED);
                

        $auth = $this->customerService->login(["email" => $data["email"], "password" => $data["password"]]);

       // $auth = $this->customerService->login(["email" => $data["email"], "password" => "admin" ]);

        return !is_null($auth) ? APIResponse::response($request, 'auth', $auth, 200) : APIResponse::error($request, "Invalid credentials. Cusotmer does not exist.", 404);
      
    }

    public function findCustomerById(Request $request, $idCustomer) {
        $customer = $this->customerService->findCustomerById($idCustomer);
        return !is_null($customer) ? APIResponse::response($request, 'data', $customer, 200) : APIResponse::error($request, "Cusotmer not found.", 404);
    }
}
