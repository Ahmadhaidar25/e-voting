<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like extends Model
{
  use HasFactory;
  protected $table = 'like';
  protected $guarded=['id'];

  public function kandidat()
  {
     return $this->belongsTo(kandidat::class);
  }

  public function user()
  {
     return $this->belongsTo(User::class);
  }

  
}
