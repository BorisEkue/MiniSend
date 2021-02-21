<?php

namespace App\Repositories\Interfaces;


interface CustomerRepositoryInterface {

     public function findByEmailPassword(array $credentials);

    // public function create(array $user_data);
    
    // public function findAll();

    // public function find($id);
}