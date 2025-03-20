<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'completed'];
    protected $guarded = ['_token']; // Explicitly guard _token to prevent mass assignment
}