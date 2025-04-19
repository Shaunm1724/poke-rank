<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pokemon Rank</title>
    @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-900 text-gray-200 min-h-screen flex flex-col">
    <nav class="bg-gray-800 text-white shadow-md border-b border-gray-700">
        <div class="container mx-auto px-4 py-3">
            <div class="flex flex-col sm:flex-row justify-between items-center space-y-2 sm:space-y-0">
                <a href="{{ route('pokemon.index') }}" class="text-2xl font-bold text-red-400">Pokemon Battle</a>
                <div class="space-x-4">
                    <a href="{{ route('pokemon.index') }}" class="hover:text-red-400 transition-colors {{ request()->routeIs('pokemon.index') ? 'text-red-400 font-bold' : '' }}">Vote</a>
                    <a href="{{ route('pokemon.rank') }}" class="hover:text-red-400 transition-colors {{ request()->routeIs('pokemon.rank') ? 'text-red-400 font-bold' : '' }}">Rankings</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 flex-grow">
        {{$slot}}
    </main>

    <footer class="bg-gray-800 text-gray-400 text-center py-4 border-t border-gray-700">
        <p>Pokemon Battle App &copy; {{ date('Y') }}</p>
    </footer>
</body>
</html>