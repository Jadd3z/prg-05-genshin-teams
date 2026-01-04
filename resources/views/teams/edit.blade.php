<x-layout>
    <x-slot:heading>
        Edit Team: {{ $team->TeamName }}
    </x-slot:heading>

    <div class="max-w-4xl mx-auto py-6">

        {{-- Card Container --}}
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">

            {{-- Header/Banner --}}
            <div class="bg-gray-50 px-8 py-6 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Team Configuration</h2>
                <p class="text-sm text-gray-500 mt-1">Update your team composition and elemental synergy.</p>
            </div>

            <form method="POST" action="{{ route('teams.update', $team) }}" class="p-8 space-y-8">
                @csrf
                @method('PUT')

                {{-- SECTION 1: Team Details --}}
                <div class="space-y-6">
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wide border-b pb-2 mb-4">
                        Basic Info
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Team Name --}}
                        <div class="col-span-1">
                            <label for="TeamName" class="block text-sm font-medium text-gray-700 mb-1">Team Name</label>
                            <input type="text" id="TeamName" name="TeamName"
                                   value="{{ old('TeamName', $team->TeamName) }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors"
                                   placeholder="e.g. National Team">
                            @error('TeamName')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Primary Reaction --}}
                        <div class="col-span-1">
                            <label for="PrimaryReaction" class="block text-sm font-medium text-gray-700 mb-1">Primary
                                Reaction</label>
                            <input type="text" id="PrimaryReaction" name="PrimaryReaction"
                                   value="{{ old('PrimaryReaction', $team->PrimaryReaction) }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors"
                                   placeholder="e.g. Vaporize">
                            @error('PrimaryReaction')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Image URL (Full Width) --}}
                        <div class="col-span-1 md:col-span-2">
                            <label for="image_url" class="block text-sm font-medium text-gray-700 mb-1">Image
                                URL</label>
                            <input type="url" id="image_url" name="image_url"
                                   value="{{ old('image_url', $team->image_url) }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 transition-colors font-mono text-sm"
                                   placeholder="https://...">
                            @error('image_url')
                            <p class="mt-1 text-sm text-red-600 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- SECTION 2: Character Roster --}}
                <div>
                    <h3 class="text-sm font-bold text-gray-900 uppercase tracking-wide border-b pb-2 mb-6">
                        Party Setup
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        {{-- Main Character (Highlighted) --}}
                        <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                            <label for="MainCharacterID" class="block text-sm font-bold text-indigo-900 mb-2">
                                ⭐️ Main DPS
                            </label>
                            <select name="MainCharacterID" id="MainCharacterID" required
                                    class="w-full rounded-md border-indigo-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 bg-white">
                                @foreach($characters as $character)
                                    <option value="{{ $character->CharacterID }}"
                                        {{ old('MainCharacterID', $team->MainCharacterID) == $character->CharacterID ? 'selected' : '' }}>
                                        {{ $character->Name }} ({{ $character->Element }})
                                    </option>
                                @endforeach
                            </select>
                            @error('MainCharacterID')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Supports (Grid) --}}
                        @php
                            $supports = [
                                ['id' => 'SupportCharacter1ID', 'label' => 'Sub DPS / Support', 'value' => $team->SupportCharacter1ID],
                                ['id' => 'SupportCharacter2ID', 'label' => 'Support / Healer', 'value' => $team->SupportCharacter2ID],
                                ['id' => 'SupportCharacter3ID', 'label' => 'Support / Flex', 'value' => $team->SupportCharacter3ID],
                            ];
                        @endphp

                        @foreach($supports as $support)
                            <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
                                <label for="{{ $support['id'] }}" class="block text-sm font-medium text-gray-700 mb-2">
                                    {{ $support['label'] }}
                                </label>
                                <select name="{{ $support['id'] }}" id="{{ $support['id'] }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">-- Empty Slot --</option>
                                    @foreach($characters as $character)
                                        <option value="{{ $character->CharacterID }}"
                                            {{ old($support['id'], $support['value']) == $character->CharacterID ? 'selected' : '' }}>
                                            {{ $character->Name }} ({{ $character->Element }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endforeach

                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-100">
                    <a href="{{ route('teams.show', $team) }}"
                       class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-300 shadow-md transition-all">
                        Save Changes
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>
