<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Profile extends Model
{
	
     protected $table = "profiles";

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at'
    ];

    
    protected $dates = [
        'created_at'
    ];

    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

  
    public function scopeLastMonth($query, $limit = 5)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subMonth(), Carbon::now()])
                     ->latest()
                     ->limit($limit);
    }

   
    public function scopeLastWeek($query)
    {
        return $query->whereBetween('created_at', [Carbon::now()->subWeek(), Carbon::now()])
                     ->latest();
    }

   
   public function scopeSlug($query ,$slug)
   {
       return $query->where('slug', $slug)->first();
   }


    public function user()
    {
        return $this->belongsToMany(User::class);
    }


}


