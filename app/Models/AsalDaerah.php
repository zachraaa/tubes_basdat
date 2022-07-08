<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsalDaerah extends Model
{
    use HasFactory;

    public function Resep(){
        return $this->belongsTo(Resep::class);
    }
}
