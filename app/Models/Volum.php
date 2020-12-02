<?php

namespace App\Models;

use App\Models\Author;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Volum extends Model
{
    use HasFactory;
    protected $guarded = [];

    public $timestamps = false;

   public function author()
   {
       return $this->belongsTo(Author::class);
   }
}
