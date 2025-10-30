<x-layout>

    <x-slot:heading>
        Team
    </x-slot:heading>
    <h2 class="font-bold text-3xl">{{$team['PrimaryReaction']}}</h2>

    <p>
        you need character like <strong>{{$character['Name']}}</strong> with element of
        <strong>{{$Character['element']}} </strong> for the reaction.
    </p>


</x-layout>
