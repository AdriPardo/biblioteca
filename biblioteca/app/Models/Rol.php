<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    public function Usuario()
    {
     return $this->belongsTo('App\Models\Usuario');
    }
}
