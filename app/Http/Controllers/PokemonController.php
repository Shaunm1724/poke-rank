<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index() {
        $pokemons = Pokemon::getRandomPair();
        return view('index', ['pokemons' => $pokemons]);
    }

    public function rank() {
        $pokemons = Pokemon::orderBy('wins', 'desc')->paginate(10);
        return view('rank', ['pokemons' => $pokemons]);
    }

    public function battle($idwinner, $idloser) {
        $winner = Pokemon::findOrFail($idwinner)->increment('wins');
        $loser = Pokemon::findOrFail($idloser)->increment('losses');
        return redirect()->route('pokemon.index');
    }
}
