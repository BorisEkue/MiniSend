<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MiniSendTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testLoginCustomer() {
        $this->json('POST', '/api/v1/customers/login',[
            "email" => "admin@gmail.com",
            "password" => "admin"
        ])
        ->assertJsonStructure([
            "status" ,
            "uri",
            "auth" => [ 
                "id_user" ,
                "access_token" ,
                "expires_at"
            ]
        ])
        ->assertStatus(200);
    }

    public function testLoginInvalidCredentials() {
        $this->json('POST', '/api/v1/customers/login',[
            "email" => "xyz@gmail.com",
            "password" => "admin"
        ])
        ->assertExactJson([
            "status" => 404,
            "uri" => "api/v1/customers/login",
            "error" => "Not Found",
            "error_description" => "Invalid credentials. Cusotmer does not exist."
        ])
        ->assertStatus(404);
    }

    public function testGetCustomerById() {
        $this->get('api/v1/customers/1')
        ->assertJsonStructure([
            'status',
            "uri"  ,
            "data" => [
                "id",
                "firstname",
                "lastname",
                "email",
                "created_at",
                "updated_at"
            ]
                    
        ])
        ->assertStatus(200);
    }

    public function testGetUnexistingCustomerId() {
        $this->get('api/v1/customers/112545')
        ->assertExactJson([
            "status" => 404,
            "uri" => "api/v1/customers/112545",
            "error" => "Not Found",
            "error_description" => "Cusotmer not found."
                    
        ])
        ->assertStatus(404);
    }

    public function testSendEmail() {
        $this->json('POST', '/api/v1/emails',[
            "from" => "admin@gmail.com",
            "to" => "daniel@gmail.com",
            "cc" => "ange@gmail.com",
            "subject" => "Hello",
            "content" => "Hello world",
            "content-type" => "html",
            "id_customer" => "xyz@gmail.com"
            
        ])
        ->assertJsonStructure([
            'status',
            "uri"  ,
            "data" => [
                "idMail",
                "from",
                "to",
                "cc",
                "subject",
                "content",
                "content_type",
                "has_files",
                "updated_at",
                "created_at",
                "filesAttached" 
                

            ]
                    
        ])
        ->assertStatus(200);
    }

    public function testGetEmailByCustomerAddressMail() {
        $this->get('api/v1/emails/by/customer?email=admin@gmail.com&offset=0&size=100')
        ->assertJsonStructure([
            "status",
            "uri" ,
            "data"
                    
        ])
        ->assertStatus(200);
    }


}
