<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Visit;

class Pet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
