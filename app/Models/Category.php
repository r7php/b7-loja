<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    //
     protected $table = 'category';

       public function advertise() : HasMany {
        return $this->hasMany(Advertise::class);
    }
}
