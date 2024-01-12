<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Bagsh;
use App\Models\Suragch;

class Angi extends Model
{
    use HasFactory;

    public function suragches(): HasMany {
        return $this->hasMany(Suragch:: class);
    }
    public function bagsh(): HasOne {
        return $this->hasOne(Bagsh:: class);
    }
}
