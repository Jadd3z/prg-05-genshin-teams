<h1>Edit Team: {{ $team->TeamName }}</h1>

<form method="POST" action="{{ route('teams.update', $team) }}">
    @csrf
    @method('PUT')

    <div>
        <label for="TeamName">Team Name:</label>
        <input type="text" id="TeamName" name="TeamName" value="{{ old('TeamName', $team->TeamName) }}">
        @error('TeamName') <span style="color: red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="PrimaryReaction">Primary Reaction:</label>
        <input type="text" id="PrimaryReaction" name="PrimaryReaction"
               value="{{ old('PrimaryReaction', $team->PrimaryReaction) }}">
        @error('PrimaryReaction') <span style="color: red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="MainCharacterID">Main Character:</label>
        <select name="MainCharacterID" id="MainCharacterID" required>
            @foreach($characters as $character)
                <option
                    value="{{ $character->CharacterID }}"
                    {{ old('MainCharacterID', $team->MainCharacterID) == $character->CharacterID ? 'selected' : '' }}
                >
                    {{ $character->Name }} ({{ $character->Element }})
                </option>
            @endforeach
        </select>
        @error('MainCharacterID') <span style="color: red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="SupportCharacter1ID">Support 1:</label>
        <select name="SupportCharacter1ID" id="SupportCharacter1ID">
            <option value="">-- No Character --</option> @foreach($characters as $character)
                <option
                    value="{{ $character->CharacterID }}"
                    {{ old('SupportCharacter1ID', $team->SupportCharacter1ID) == $character->CharacterID ? 'selected' : '' }}
                >
                    {{ $character->Name }} ({{ $character->Element }})
                </option>
            @endforeach
        </select>
        @error('SupportCharacter1ID') <span style="color: red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="SupportCharacter2ID">Support 2:</label>
        <select name="SupportCharacter2ID" id="SupportCharacter2ID">
            <option value="">-- No Character --</option> @foreach($characters as $character)
                <option
                    value="{{ $character->CharacterID }}"
                    {{ old('SupportCharacter2ID', $team->SupportCharacter2ID) == $character->CharacterID ? 'selected' : '' }}
                >
                    {{ $character->Name }} ({{ $character->Element }})
                </option>
            @endforeach
        </select>
        @error('SupportCharacter2ID') <span style="color: red">{{ $message }}</span> @enderror
    </div>

    <div>
        <label for="SupportCharacter3ID">Support 3:</label>
        <select name="SupportCharacter3ID" id="SupportCharacter3ID">
            <option value="">-- No Character --</option> @foreach($characters as $character)
                <option
                    value="{{ $character->CharacterID }}"
                    {{ old('SupportCharacter3ID', $team->SupportCharacter3ID) == $character->CharacterID ? 'selected' : '' }}
                >
                    {{ $character->Name }} ({{ $character->Element }})
                </option>
            @endforeach
        </select>
        @error('SupportCharacter3ID') <span style="color: red">{{ $message }}</span> @enderror
    </div>


    <button type="submit">Update Team</button>
</form>
