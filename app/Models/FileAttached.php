<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileAttached extends Model {

    protected $table = "files_attached";

    protected $primaryKey = "id";

    protected $hidden = [
        'id'
    ];

    public function __construct() {
    }
}