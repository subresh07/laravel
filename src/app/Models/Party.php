<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Party extends Model
{
    // Enable soft deletes (optional, if you want to allow "soft" deletion)
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

   
    public function scopeByCity($query, $city)
    {
        return $query->where('city', $city);
    }

    /**
     * Scope to search parties by full name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $searchTerm
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearchByName($query, $searchTerm)
    {
        return $query->where('full_name', 'like', '%' . $searchTerm . '%');
    }
}