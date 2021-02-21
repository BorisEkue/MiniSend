<?php

namespace App\Repositories;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Models\Customer;

class CustomerRepository implements CustomerRepositoryInterface {

    public function findByEmailPassword(array $credentials) {

        $customer = Customer::where(["email" => $credentials["email"], "password" => $credentials["password"]])
                    ->first();
        
        return $customer;
    }
}