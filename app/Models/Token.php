<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Token extends Model {

    protected $table = "tokens";

    protected $primaryKey = "id";

    public function __construct() {

    }
}