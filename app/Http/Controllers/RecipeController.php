<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;

class RecipeController extends Controller
{

    public function home(){
        $reseps = Resep::all();
        return view('home', compact(['reseps']));
    }

    public function profil(){
        return view('profil');
    }

    public function makanan(){
        $reseps = Resep::all();
        return view('makanan', compact(['reseps']));
    }

    public function kalkulator(){
        return view('kalkulator');
    }

    public function watchList(){
        return view('watchList');
    }

    public function list(){
        return view('list');
    }
}
