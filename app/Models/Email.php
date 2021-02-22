<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileAttached;

class Email extends Model {

    protected $table = "emails";

    protected $primaryKey = "id";

    protected $hidden = [
        'id'
    ];

     protected $with = ['filesAttached'];

    public function __construct() {
    }

    public function filesAttached() {
        
        return $this->hasMany(FileAttached::class, "email_id", "idmail");
    }
}