<?php

namespace App\Services;

use App\Repositories\Interfaces\CustomerRepositoryInterface;
use App\Services\Interfaces\CustomerServiceInterface;
use App\Models\Token;

class CustomerService implements CustomerServiceInterface {

    private CustomerRepositoryInterface $customerRepositoryIterface;

    public function __construct(CustomerRepositoryInterface $customerRepositoryIterface)
    {
        $this->customerRepositoryIterface = $customerRepositoryIterface;
    }

    public function login(array $credentials) {

        $customer =  $this->customerRepositoryIterface->findByEmailPassword($credentials);

        $response =  null ;

        if(!is_null($customer)) {

            $token = $this->generateToken($customer->id);

            $response = [
                'id_user' => $customer->id,
                'access_token' => $token['access_token'],
                'expires_at' => $token['expires_at']
            ];

            $this->saveToken($token);           
        }               

        return $response ;
    }

    /**
     * Generate authentication token 
     */
    public function generateToken($idUser) {
        return [
            'access_token' => bin2hex(random_bytes(16)),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+1 day', time())),
            'token_type' => 'bearer',
            'id_user' => $idUser
        ];
    }

    public function saveToken($token_data) {
        
        $token = new Token();
        $token->id = uniqid('t_');
        $token->access_token = $token_data['access_token'];
        $token->expires_at = $token_data['expires_at'];
        $token->id_user = $token_data['id_user'];
        $token->token_type = $token_data['token_type'];
        
        return $token->save();
         
    }

    public function findCustomerById( $idCustomer) {
        return $this->customerRepositoryIterface->findCustomerById($idCustomer);
    }

    
}