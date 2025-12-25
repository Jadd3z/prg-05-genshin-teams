<x-layout>

    <x-slot:heading>
        Teams page
    </x-slot:heading>

    <form action="{{ route('teams.index') }}" method="GET" class="mb-6 p-4 bg-gray-100 rounded">
        <div class="flex gap-4">

            <input type="text" name="search"
                   placeholder="Search Team Name..."
                   value="{{ request('search') }}"
                   class="border p-2 rounded">

            <select name="reaction" class="border p-2 rounded">
                <option value="">-- All Reactions --</option>
                @foreach($reactions as $reaction)
                    <option value="{{ $reaction }}" {{ request('reaction') == $reaction ? 'selected' : '' }}>
                        {{ $reaction }}
                    </option>
                @endforeach
            </select>

            <select name="element" class="border p-2 rounded">
                <option value="">-- Main Char Element --</option>
                @foreach($elements as $element)
                    <option value="{{ $element }}" {{ request('element') == $element ? 'selected' : '' }}>
                        {{ $element }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Filter</button>
            <a href="{{ route('teams.index') }}" class="text-red-500 p-2">Reset</a>
        </div>
    </form>

    <ul class="space-y-4"> @foreach($teams as $team)
            <li class="flex items-center justify-between border-b pb-2">

                <a href="/teams/{{$team['TeamID']}}" class="text-blue-500 hover:underline">
                    <strong>{{ $team['TeamName']}}: </strong>{{$team['PrimaryReaction']}}
                </a>

                <form action="{{ route('teams.toggle', $team['TeamID']) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="px-3 py-1 rounded text-sm {{ $team->is_active ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                        {{ $team->is_active ? 'Active' : 'Inactive' }}
                    </button>
                </form>

            </li>
        @endforeach
    </ul>

    <div class="mt-6">
        <a href="/create" class="bg-gray-800 text-white px-4 py-2 rounded">Create Team</a>
    </div>

</x-layout>
