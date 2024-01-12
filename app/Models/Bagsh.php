<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Angi;
use Illuminate\Database\Eloquent\Relations\belongsTo; 

class Bagsh extends Model
{
    use HasFactory;

    public function angi():belongsTo {
        return $this->belongsTo(Angi:: class,);
    }
}
