<x-layout>

    <x-slot:heading>
        Teams page
    </x-slot:heading>

    <ul>
        @foreach($teams as $team)
            <li>
                <a href="/teams/{{$team['id']}}" class="text-blue-500 hover:underline">
                    <strong>{{ $team['reaction']}}  </strong>: elements needed {{$team['elements']}}
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
