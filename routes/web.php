<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::controller(PokemonController::class)->group(function () {
    Route::get('/', 'index')->name('pokemon.index');
    Route::get('rank', 'rank')->name('pokemon.rank');
    Route::post('battle/{idwinner}/{idloser}', 'battle')->name('pokemon.battle');
});