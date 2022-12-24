<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kandidat extends Model
{
    use HasFactory;
    protected $table = 'kandidat';

     public function prodi()
    {
       return $this->belongsTo(prodi::class);
    }

     public function voting()
    {
       return $this->hasMany(voting::class);
    }

      public function like()
    {
       return $this->hasMany(like::class);
    }

     public function user()
    {
       return $this->hasMany(User::class);
    }

   
}
