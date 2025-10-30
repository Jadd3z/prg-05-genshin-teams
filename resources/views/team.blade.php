<x-layout>

    <x-slot:heading>
        Team
    </x-slot:heading>
    <h2 class="font-bold text-3xl">{{$team['reaction']}}</h2>

    <p>
        you need character like <strong>{{$team['character']}}</strong> with element of
        <strong>{{$team['element']}} </strong> for the reaction.
    </p>


</x-layout>
