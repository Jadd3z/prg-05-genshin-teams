<x-layout>

    <x-slot:heading>
        Team
    </x-slot:heading>
    <h2 class="font-bold text-3xl">{{$team['TeamName']}}</h2>

    <p>
        this is team <strong>{{$team['TeamName']}}</strong> with main reaction of
        <strong>{{$team['PrimaryReaction']}}</strong>
    </p>


</x-layout>
