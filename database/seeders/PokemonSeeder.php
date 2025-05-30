<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Http;

class PokemonSeeder extends Seeder
{

    private function getAllPokemon() {
        $query = <<<'GRAPHQL'
        query {
            pokemon_v2_pokemon(order_by: {id: asc}) {
                name
                id
                pokemon_v2_pokemonspecy {
                    name
                }
            }
        }
        GRAPHQL;

        $response = Http::post('https://beta.pokeapi.co/graphql/v1beta', [
            'query' => $query,
        ])->throw()->json();

        return array_map(fn ($pokemon) => [
            'name' => $pokemon['pokemon_v2_pokemonspecy']['name'],
            'dex_id' => $pokemon['id'],
        ], $response['data']['pokemon_v2_pokemon']);

    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command->info('Fetching data from pokeapi... ');

        $allPokemon = $this->getAllPokemon();
        $totalPokemon = count($allPokemon);

       foreach ($allPokemon as $index => $pokemon) {
            $this->command->info("Processing {$pokemon['name']} (".($index + 1)."/{$totalPokemon})");

            Pokemon::firstOrCreate(
                ['pokedex_id' => $pokemon['dex_id']],
                [
                    'name' => ucfirst($pokemon['name']),
                    'sprite' => "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$pokemon['dex_id']}.png",
                ]
            );
        }
        $this->command->info('Data Seeding Completed.');
    }
}
