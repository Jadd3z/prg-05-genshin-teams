<x-layout>

    <x-slot:heading>
        Teams page
    </x-slot:heading>

    <ul>
        @foreach($teams as $team)
            <li>
                <a href="/teams/{{$team['TeamID']}}" class="text-blue-500 hover:underline">
                    <strong>{{ $team['TeamName']}}: </strong>{{$team['PrimaryReaction']}}
                </a>
            </li>

        @endforeach
    </ul>

    <a href="/{{ route('create') }}"> create team</a>
</x-layout>
