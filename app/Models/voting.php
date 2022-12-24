<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voting extends Model
{
    use HasFactory;
    protected $table = 'voting';
    //protected $fillable=['id','user_id','kandidat_id'];

    public function kandidat()
    {
       return $this->belongsTo(kandidat::class);
   }

   public function user()
   {
     return $this->belongsTo(User::class);
 }
}
