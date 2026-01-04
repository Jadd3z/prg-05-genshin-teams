<x-layout>
    <x-slot:heading>
        Admin Dashboard
    </x-slot:heading>

    @if($latestTeam)
        <div class="mb-10 p-6 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg text-white">
            <div class="flex justify-between items-center">
                <div>
                    <h2 class="text-xs uppercase tracking-widest font-semibold opacity-75">Newest Submission</h2>
                    <h3 class="text-3xl font-bold mt-1">{{ $latestTeam->TeamName }}</h3>
                    <p class="mt-2 opacity-90 text-sm">
                        Created {{ $latestTeam->created_at->diffForHumans() }}
                        by {{ $latestTeam->user?->name ?? 'Deleted User' }}
                    </p>

                    <div class="mt-4 flex gap-2">
                    <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold">
                        Main: {{ $latestTeam->mainCharacter->Name ?? 'Unknown' }}
                    </span>
                        <span class="px-3 py-1 bg-white/20 rounded-full text-xs font-bold">
                        Reaction: {{ $latestTeam->PrimaryReaction }}
                    </span>
                    </div>
                </div>

                <a href="{{ route('teams.show', $latestTeam->TeamID) }}"
                   class="px-5 py-3 bg-white text-indigo-700 font-bold rounded-lg shadow-md hover:bg-gray-100 transition">
                    Review Team &rarr;
                </a>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <div class="lg:col-span-2 space-y-6">

            
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team
                            Name
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($teams as $team)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $team->TeamName }}</div>
                                <div class="text-sm text-gray-500">{{ $team->PrimaryReaction }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('teams.toggle', $team->TeamID) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $team->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $team->is_active ? 'Active' : 'Inactive' }}
                                    </button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('teams.show', $team->TeamID) }}"
                                   class="text-indigo-600 hover:text-indigo-900">View</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if(method_exists($teams, 'links'))
                    <div class="p-4">
                        {{ $teams->links() }}
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-6">

            <div class="bg-white p-6 border border-gray-200 rounded-lg shadow-sm">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Add New Character</h3>

                <form action="{{ route('admin.characters.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Name</label>
                        <input type="text" name="Name" required
                               class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase mb-1">Element</label>
                        <select name="Element" required
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="Pyro">Pyro</option>
                            <option value="Hydro">Hydro</option>
                            <option value="Anemo">Anemo</option>
                            <option value="Electro">Electro</option>
                            <option value="Dendro">Dendro</option>
                            <option value="Cryo">Cryo</option>
                            <option value="Geo">Geo</option>
                        </select>
                    </div>

                    <button type="submit"
                            class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 transition font-medium">
                        Save Character
                    </button>
                </form>
            </div>
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                     role="alert">
                    <strong class="font-bold">Success!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

        </div>
    </div>
</x-layout>
