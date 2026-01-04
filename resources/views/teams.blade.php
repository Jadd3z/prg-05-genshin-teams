<x-layout>
    <x-slot:heading>
        Browse Teams
    </x-slot:heading>

    {{-- FILTER SECTION --}}
    <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 mb-8 shadow-sm">
        <form action="{{ route('teams.index') }}" method="GET"
              class="flex flex-col md:flex-row gap-4 items-end md:items-center">

            <div class="flex-1 w-full">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Search</label>
                <input type="text" name="search"
                       placeholder="Find a team..."
                       value="{{ request('search') }}"
                       class="w-full border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="w-full md:w-48">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Reaction</label>
                <select name="reaction"
                        class="w-full border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Reactions</option>
                    @foreach($reactions as $reaction)
                        <option value="{{ $reaction }}" {{ request('reaction') == $reaction ? 'selected' : '' }}>
                            {{ $reaction }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="w-full md:w-48">
                <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Element</label>
                <select name="element"
                        class="w-full border-gray-300 rounded-md text-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Elements</option>
                    @foreach($elements as $element)
                        <option value="{{ $element }}" {{ request('element') == $element ? 'selected' : '' }}>
                            {{ $element }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-2 w-full md:w-auto">
                <button type="submit"
                        class="flex-1 md:flex-none bg-gray-800 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-black transition">
                    Filter
                </button>

                @if(request()->hasAny(['search', 'reaction', 'element']))
                    <a href="{{ route('teams.index') }}"
                       class="flex items-center text-red-600 text-sm px-3 hover:underline whitespace-nowrap">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    {{-- TEAMS GRID --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($teams as $team)
            <div
                class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition flex flex-col overflow-hidden group">

                {{-- 1. COOL IMAGE SECTION (Scaled down for cards) --}}
                <div class="relative h-52 w-full bg-gray-900 overflow-hidden group">

                    @if($team->image_url)
                        {{-- Background Blur Layer --}}
                        <div class="absolute inset-0">
                            <img src="{{ $team->image_url }}"
                                 class="w-full h-full object-cover opacity-40 blur-md scale-110"
                                 alt="Background">
                        </div>

                        {{-- Main Image (Centered & Contain) --}}
                        <div class="relative z-10 h-full flex items-center justify-center p-4">
                            <img src="{{ $team->image_url }}"
                                 alt="{{ $team->TeamName }}"
                                 class="h-full w-auto max-w-full object-contain shadow-sm transform group-hover:scale-110 transition duration-500">
                        </div>
                    @else
                        {{-- Fallback if no image exists --}}
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-indigo-900 to-purple-900 flex items-center justify-center">
                            <span class="text-4xl">⚔️</span>
                        </div>
                    @endif

                </div>
                {{-- 2. CONTENT SECTION --}}
                <div class="p-5 flex-1">
                    <div class="flex justify-between items-start">
                        <h3 class="text-lg font-bold text-gray-900 leading-tight">
                            <a href="/teams/{{$team['TeamID']}}" class="hover:text-indigo-600 transition">
                                {{ $team['TeamName'] }}
                            </a>
                        </h3>
                    </div>

                    <div class="mt-3 flex flex-wrap gap-2">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                            {{ $team['PrimaryReaction'] }}
                        </span>

                        {{-- Optional: Add Element Badge if available --}}
                        @if(isset($team['Element']))
                            <span
                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                            {{ $team['Element'] }}
                        </span>
                        @endif
                    </div>
                </div>

                {{-- 3. FOOTER / ADMIN ACTIONS --}}
                <div class="bg-gray-50 px-5 py-3 border-t border-gray-200 flex items-center justify-between">
                    <span class="text-xs text-gray-500 font-medium">Status</span>

                    @if(auth()->id() === $team->user_id || auth()->user()?->is_admin)
                        <form action="{{ route('teams.toggle', $team['TeamID']) }}" method="POST">
                            @csrf
                            <button type="submit"
                                    class="px-3 py-1 rounded-full text-xs font-bold cursor-pointer transition {{ $team->is_active ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-red-100 text-red-700 hover:bg-red-200' }}">
                                {{ $team->is_active ? 'Active' : 'Inactive' }}
                            </button>
                        </form>
                    @else
                        <span
                            class="px-3 py-1 rounded-full text-xs font-bold cursor-default opacity-75 {{ $team->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                            {{ $team->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    @endif
                </div>

            </div>
        @endforeach
    </div>

    {{-- CREATE BUTTON --}}
    <div class="mt-8 flex justify-end">
        <a href="{{ route('teams.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            + Create New Team
        </a>
    </div>

</x-layout>
