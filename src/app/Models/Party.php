<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party extends Model
{
    
    use SoftDeletes;

        protected $table = 'parties';

    
    protected $fillable = [
        'full_name',
        'Phone_no',
        'address',
        'city',
    ];

    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

   
    public $timestamps = true;



    public function scopeSearch($query, $search)
    {
        return $query->where(function ($query) use ($search) {
            $query->where('full_name', 'ILIKE', '%' . $search . '%')
                  ->orWhere('city', 'ILIKE', '%' . $search . '%');
        });
    }

   

}