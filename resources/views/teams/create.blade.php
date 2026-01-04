<x-layout>

    <x-slot:heading>
        Create your team
    </x-slot:heading>

    <!-- CONTAINER: Adds a central card effect and limits width -->
    <div class="max-w-xl mx-auto p-6 bg-white shadow-xl rounded-xl border border-gray-100 mt-8">

        <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Create a New Team</h1>
        <div class="max-w-xl mx-auto p-6 bg-white shadow-lg rounded-xl">

            <h2 class="text-3xl font-extrabold text-gray-900 mb-6 text-center">
                Assemble Your Team ⚔️
            </h2>

            <form method="POST" action="{{ route('teams.store') }}" class="space-y-6">
                @csrf

                {{-- 1. General Team Details --}}
                <div class="space-y-4 border-b pb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Team Information</h3>

                    {{-- Team Name Input --}}
                    <div>
                        <label for="TeamName" class="block text-sm font-medium text-gray-700 mb-1">Team Name:</label>
                        <input
                            type="text"
                            name="TeamName"
                            id="TeamName"
                            required
                            placeholder="E.g., Hu Tao Vape"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                    </div>

                    {{-- NEW: Image URL Input --}}
                    <div>
                        <label for="image_url" class="block text-sm font-medium text-gray-700 mb-1">Team Image URL
                            (Optional):</label>
                        <input
                            type="url"
                            name="image_url"
                            id="image_url"
                            placeholder="https://example.com/my-team-showcase.jpg"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                    </div>

                    {{-- Primary Reaction Input --}}
                    <div>
                        <label for="PrimaryReaction" class="block text-sm font-medium text-gray-700 mb-1">Primary
                            Elemental Reaction:</label>
                        <input
                            type="text"
                            name="PrimaryReaction"
                            id="PrimaryReaction"
                            placeholder="E.g., Vaporize, Aggravate"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                    </div>
                </div>


                {{-- 2. Main Character Selection --}}
                <div class="space-y-4 border-b pb-6">
                    <h3 class="text-xl font-semibold text-gray-800">Main Damage Dealer</h3>

                    {{-- Main Character (MainCharacterID) --}}
                    <div>
                        <label for="main_character" class="block text-sm font-medium text-gray-700 mb-1">
                            Select **Main Character** (DPS):
                        </label>
                        <select
                            name="MainCharacterID"
                            id="main_character"
                            required
                            class="mt-1 block w-full px-4 py-2 border border-indigo-500 bg-indigo-50 text-indigo-900 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                            <option value="" disabled selected>Choose Main DPS...</option>
                            @foreach ($characters as $character)
                                <option value="{{ $character->CharacterID }}">
                                    {{ $character->Name }} ({{ $character->Element }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- 3. Support Characters Selection --}}
                <div class="space-y-4">
                    <h3 class="text-xl font-semibold text-gray-800">Support Roles (Sub-DPS, Healer, Shielder)</h3>

                    {{-- Support Characters (SupportCharacter1ID, 2ID, 3ID) --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        @foreach ([1, 2, 3] as $i)
                            <div class="p-3 border border-gray-200 rounded-lg bg-gray-50">
                                {{-- The input name MUST match the database column --}}
                                <label for="support_{{ $i }}" class="block text-xs font-medium text-gray-600 mb-1">
                                    Support Slot {{ $i }}:
                                </label>
                                <select
                                    name="SupportCharacter{{ $i }}ID"
                                    id="support_{{ $i }}"
                                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 transition text-sm"
                                >
                                    <option value="" selected>None (Empty Slot)</option>
                                    @foreach ($characters as $character)
                                        <option value="{{ $character->CharacterID }}">
                                            {{ $character->Name }} ({{ $character->Element }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach
                    </div>
                    <small class="block text-right text-xs text-gray-500 italic">
                        Support slots are optional.
                    </small>
                </div>


                {{-- Submit Button --}}
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-lg shadow-md text-lg font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150 ease-in-out"
                    >
                        Create Team
                    </button>
                </div>
            </form>
        </div>

    </div>
    </form>
    </div>


</x-layout>
