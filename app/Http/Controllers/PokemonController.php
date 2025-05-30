<?php

namespace App\Http\Controllers;
use App\Models\Pokemon;

class PokemonController extends Controller
{
    public function index() {
        $pokemons = Pokemon::getRandomPair();
        return view('index', ['pokemons' => $pokemons]);
    }

    public function rank() {
        $pokemons = Pokemon::
        orderByRaw('CASE WHEN wins + losses > 0 THEN wins / NULLIF(wins + losses, 0) * 100 ELSE 0 END DESC')
        ->orderBy('wins', 'desc')
        ->orderBy('losses')
        ->paginate(20);
        return view('rank', ['pokemons' => $pokemons]);
    }

    public function battle($idwinner, $idloser) {
        Pokemon::findOrFail($idwinner)->increment('wins');
        Pokemon::findOrFail($idloser)->increment('losses');
        return redirect()->route('pokemon.index');
    }
}
