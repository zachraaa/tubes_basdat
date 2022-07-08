<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function jenisMasakans(){
        return $this->belongsTo(jenisMasakan::class);
    }

    public function AsalDaerah(){
        return $this->hasOne(AsalDaerah::class);
    }

    public function Pengguna(){
        return $this->belongsToMany(Pengguna::class);
    }
}
