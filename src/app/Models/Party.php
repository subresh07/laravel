<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    protected $table = "parties";

    protected $primaryKey = "id";

    protected $fillable = array("full_name");
}
