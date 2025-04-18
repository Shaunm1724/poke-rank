
@foreach ($pokemons as $pokemon)
    <img
    src="{{ $pokemon->sprite }}"
    class="w-64 h-64"
    alt="{{ $pokemon->name }}"
    loading="eager"
    fetchpriority="high"
    >
    
@endforeach