<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "user_id",
        "description"
    ];

    public function user(){ //belong to one formateur
        return $this->belongsTo(User::class);
    }
    
    public function apprenants(){ // formations belongs to many apprenants
        return $this->belongsToMany(User::class);
    }

}
