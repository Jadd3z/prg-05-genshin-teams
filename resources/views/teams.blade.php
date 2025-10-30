<x-layout>

    <x-slot:heading>
        Teams page
    </x-slot:heading>

    <ul>
        @foreach($teams as $team)
            <li>
                <a href="/teams/{{$team['id']}}" class="text-blue-500 hover:underline">
                    <strong>{{ $team['TeamName']}}  </strong>: is a {{$team['PrimaryReaction']}} team
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
