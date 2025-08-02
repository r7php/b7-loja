<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Advertise extends Model
{
    //
    public function category():BelongsTo{
        return $this->belongsTo(category::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function state() : BelongsTo {
        return $this->belongsTo(State::class);
    }

    public function images():HasMany{
        return $this->HasMany(AdvertiseImage::class);
    }

}
