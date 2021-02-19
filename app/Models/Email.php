<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

    protected $table = "emails";

    protected $primaryKey = "id";

    public function __construct() {
    }
}