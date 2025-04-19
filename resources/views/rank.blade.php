<x-layout>
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-8 text-red-400">Pokemon Rankings</h1>
        
        <div class="max-w-3xl mx-auto">
            <ul class="divide-y divide-gray-700">
                @foreach ($pokemons as $index => $pokemon)
                    <li class="py-4 flex flex-col sm:flex-row items-center hover:bg-gray-800 rounded-lg transition-colors px-4 gap-2 sm:gap-0">
                        <div class="bg-red-600 text-white w-8 h-8 rounded-full flex items-center justify-center font-bold sm:mr-4">
                            {{ $index + 1 + ($pokemons->currentPage() - 1) * $pokemons->perPage() }}
                        </div>
                        <div class="bg-gray-700 rounded-full p-1 sm:mr-4">
                            <img
                                src="{{ $pokemon->sprite }}"
                                class="w-16 h-16 object-contain"
                                alt="{{ $pokemon->name }}"
                                loading="eager"
                                fetchpriority="high"
                            >
                        </div>
                        <div class="flex-grow text-center sm:text-left">
                            <h2 class="text-xl font-semibold capitalize text-red-300">{{ $pokemon->name }}</h2>
                        </div>
                        <div class="sm:ml-auto mt-2 sm:mt-0">
                            <span class="bg-gray-700 px-3 py-1 rounded-full text-sm">Votes: <span class="font-bold">{{ $pokemon->wins ?? 0 }}</span></span>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        
        <div class="mt-8">
            <div class="pagination-dark">
                {{ $pokemons->onEachSide(5)->links() }}
            </div>
        </div>
        
        <div class="mt-8">
            <a href="{{ route('pokemon.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition-colors">
                Back to Voting
            </a>
        </div>
    </div>
</x-layout>