<x-layout>
    <div class="text-center">
       <h1 class="text-3xl font-bold mb-8 text-red-400">Pokemon Rankings</h1>
       <div class="max-w-3xl mx-auto">
           <ul class="divide-y divide-gray-700">
               @foreach ($pokemons as $index => $pokemon)
               <li class="py-4 flex flex-col sm:flex-row items-center hover:bg-gray-800 rounded-lg transition-colors px-4 gap-3">
                   <div class="bg-red-600 text-white min-w-10 h-10 rounded-full flex items-center justify-center font-bold sm:mr-4 text-sm">
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
                       <h2 class="text-xl font-semibold capitalize text-red-300"><a href="https://www.pokemon.com/us/pokedex/{{ strtolower($pokemon->name) }}" target="_blank">{{ $pokemon->name }}</a></h2>
                   </div>
                   
                   <div class="flex flex-col sm:flex-row gap-2 items-center">
                       <div class="bg-gray-700 px-4 py-2 rounded-lg text-sm flex flex-col items-center w-full sm:w-auto">
                           <span class="text-gray-400 text-xs">Win Rate</span>
                           <span class="font-bold text-green-400 text-lg">
                               {{ ($total = $pokemon->wins + $pokemon->losses) > 0 ? round($pokemon->wins * 100 / $total) : 0 }}%
                           </span>
                       </div>
                       
                       <div class="bg-gray-700 px-4 py-2 rounded-lg text-sm flex gap-4 w-full sm:w-auto">
                           <div class="flex flex-col items-center">
                               <span class="text-gray-400 text-xs">Wins</span>
                               <span class="font-bold text-green-500">{{ $pokemon->wins ?? 0 }}</span>
                           </div>
                           <div class="flex flex-col items-center">
                               <span class="text-gray-400 text-xs">Losses</span>
                               <span class="font-bold text-red-500">{{ $pokemon->losses ?? 0 }}</span>
                           </div>
                       </div>
                   </div>
               </li>
               @endforeach
           </ul>
           <div class="mt-8">
               <div class="pagination-dark">
                   {{ $pokemons->onEachSide(1)->links() }}
               </div>
           </div>
       </div>
       <div class="mt-8">
           <a href="{{ route('pokemon.index') }}" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full transition-colors">
               Back to Voting
           </a>
       </div>
    </div>
   </x-layout>