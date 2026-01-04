<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genshin team builder</title>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Comic+Neue:wght@700&display=swap"
          rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100">

<div class="min-h-full">

    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">

                <div class="flex items-center">
                    <a href="/" class="flex-shrink-0 flex items-center text-decoration-none">
                        <span class="text-xl font-bold text-gray-900 tracking-tight">
                            BrandLogo
                        </span>
                    </a>

                    <div class="hidden md:flex ml-10 space-x-8">

                        <a href="/teams"
                           class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            Teams
                        </a>
                        <a href="/about"
                           class="text-gray-500 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">
                            about
                        </a>

                    </div>
                </div>

                <div class="flex items-center space-x-4">

                    {{-- Check if user is logged in --}}
                    @auth
                        {{--
                           ADMIN LOGIC:
                           Change 'is_admin' to whatever column name you use in your database (e.g., role === 'admin')
                        --}}
                        @if(Auth::user()->is_admin)
                            <a href="/dashboard"
                               class="hidden md:inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Dashboard
                            </a>
                        @endif

                        <a href="/profile" class="flex items-center space-x-2 text-gray-700 hover:text-gray-900">
                            <div
                                class="h-8 w-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 border border-gray-300">
                                {{ substr(Auth::user()->name, 0, 2) }}
                            </div>
                            <span class="hidden md:block text-sm font-medium">Profile</span>
                        </a>
                    @else
                        {{-- Show Login if not logged in --}}
                        <a href="/login" class="text-sm font-medium text-gray-500 hover:text-gray-900">Log in</a>
                        <a href="/register"
                           class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-900">Register</a>
                    @endauth

                </div>
            </div>
        </div>
    </nav>
    <header class="relative bg-gray-800 shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-white">
                {{ $heading ?? 'Welcome' }}
            </h1>
        </div>
    </header>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>


</body>

</html>
