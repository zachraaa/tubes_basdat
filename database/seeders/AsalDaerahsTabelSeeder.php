<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsalDaerahsTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $a = new \App\Models\AsalDaerah;
        $a->namaDaerah="Malang";
        $a->id_resep=1;
        $a->save();
    }
}
