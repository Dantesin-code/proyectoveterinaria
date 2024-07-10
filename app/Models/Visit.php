<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pet;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'reason',
        'diagnosis',
        'treatment',
    ];

    public function pet(){
        return $this->belongsTo(Pet::class);
    }
}
