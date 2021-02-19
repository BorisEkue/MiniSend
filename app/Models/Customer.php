<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {

    protected $table = "customers";

    protected $primaryKey = "id";

    protected $hidden = [
        'password'
    ];

    public function __construct() {
    }
}