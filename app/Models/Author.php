<?php

namespace App\Models;

use App\Models\Volum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function volums()
    {
        return $this->hasMany(Volum::class);
    }
}
