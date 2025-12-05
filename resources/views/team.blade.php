<x-layout>

    <x-slot:heading>
        <h2 class="font-bold text-3xl">{{$team['TeamName']}}</h2>
    </x-slot:heading>


    <ul>

        <li><strong>{{ $team->mainCharacter->Name}}</strong></li>
        <li><strong>{{$team['PrimaryReaction']}}</strong></li>
        <li><strong>{{$team->supportCharacter1->Name}}</strong></li>
        <li><strong>{{$team->supportCharacter2->Name}}</strong></li>
        <li><strong>{{$team->supportCharacter3->Name}}</strong></li>
        <li><strong> </strong></li>

    </ul>
    <a href="{{ route('teams.edit', $team) }}"> Edit </a>
    <form method="POST" action="{{ route('teams.destroy', $team) }}"
          style="display: inline;"
          onsubmit="return confirm('Are you sure you want to delete the team: {{ $team->TeamName }}?');"
    >
        @csrf
        @method('DELETE')

        <button type="submit"
                style="
                padding: 5px 10px;
                background-color: #f44336; /* Red background */
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            "
        >
            Delete Team
        </button>

</x-layout>
