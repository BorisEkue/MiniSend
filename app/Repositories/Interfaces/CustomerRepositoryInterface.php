<?php

namespace App\Repositories\Interfaces;


interface CustomerRepositoryInterface {

     public function findByEmailPassword(array $credentials);

     public function findCustomerById( $idCustomer);

}