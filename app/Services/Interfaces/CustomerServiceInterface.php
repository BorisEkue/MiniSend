<?php

namespace App\Services\Interfaces;


interface CustomerServiceInterface {

    public function login(array $credentials);

    public function findCustomerById( $idCustomer);
}