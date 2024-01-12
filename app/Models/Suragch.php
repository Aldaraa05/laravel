<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Angi;

class Suragch extends Model
{
    use HasFactory;

    public function angi() {
        return $this->belongsTo(Angi:: class);
    }
}
