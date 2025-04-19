<x-layout>
    <div class="text-center min-h-[calc(100vh-14rem)]">
        <h1 class="text-3xl font-bold mb-8 text-red-400">Choose Your Favorite Pokemon!</h1>
        
        <div class="flex flex-col lg:flex-row justify-center items-center gap-6 mb-12">
            @foreach ($pokemons as $pokemon)
                <div class="bg-gray-800 rounded-lg shadow-lg p-4 sm:p-6 border border-gray-700 transform hover:scale-105 transition-transform w-full sm:w-auto">
                    <div class="flex flex-col items-center">
                        <h2 class="text-xl font-semibold capitalize mb-4 text-red-300"><a href="https://www.pokemon.com/us/pokedex/{{ strtolower($pokemon->name) }}" target="_blank">{{ $pokemon->name }}</a></h2>
                        <div class="bg-gray-700 rounded-lg p-2 mb-4">
                            <img
                                src="{{ $pokemon->sprite }}"
                                class="w-48 h-48 sm:w-64 sm:h-64 object-contain"
                                alt="{{ $pokemon->name }}"
                                loading="eager"
                                fetchpriority="high"
                            >
                        </div>
                        <form action="{{ route('pokemon.battle', [
                            $pokemon->id,
                            $pokemons->where('id', '!=', $pokemon->id)->first()->id
                        ]) }}" method="POST" class="w-full">
                            @csrf
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full transition-colors w-full">
                                Vote for {{ ucfirst($pokemon->name) }}
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>