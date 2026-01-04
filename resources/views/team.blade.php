<x-layout>

    @if (session('error'))
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded shadow-sm">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm text-red-700">{{ session('error') }}</p>
                </div>
            </div>
        </div>
    @endif

    <x-slot:heading>
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl text-white">{{ $team['TeamName'] }}</h2>
            <span class="px-3 py-1 text-sm font-medium text-indigo-700 bg-indigo-100 rounded-full">
                {{ $team['PrimaryReaction'] }}
            </span>
        </div>
    </x-slot:heading>

    @if($team->image_url)
        <div
            class="relative w-full h-[500px] mb-8 rounded-xl overflow-hidden shadow-2xl bg-gray-900 group border border-gray-200">

            <div class="absolute inset-0">
                <img src="{{ $team->image_url }}"
                     class="w-full h-full object-cover opacity-30 blur-xl scale-110"
                     alt="Background Effect">
                <div class="absolute inset-0 bg-gradient-to-t from-gray-900/50 to-transparent"></div>
            </div>

            <div class="relative z-10 h-full flex items-center justify-center p-6">
                <img src="{{ $team->image_url }}"
                     alt="{{ $team->TeamName }}"
                     class="h-full w-auto max-w-full object-contain rounded-lg shadow-lg transform transition duration-500 hover:scale-[1.02]">
            </div>

        </div>
    @endif

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 mb-8">
        <div class="p-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4 border-b pb-2">Team Composition</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-indigo-50 p-4 rounded-lg border border-indigo-100 text-center">
                    <p class="text-xs text-indigo-500 uppercase font-bold tracking-wider mb-1">Main DPS</p>
                    <p class="font-bold text-gray-800 text-lg">{{ $team->mainCharacter->Name }}</p>
                </div>

                @foreach([$team->supportCharacter1, $team->supportCharacter2, $team->supportCharacter3] as $index => $char)
                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 text-center">
                        <p class="text-xs text-gray-500 uppercase font-bold tracking-wider mb-1">
                            Support {{ $index + 1 }}</p>
                        <p class="font-semibold text-gray-700">{{ $char->Name }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        @if(auth()->id() === $team->user_id || auth()->user()?->is_admin)
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200 flex items-center justify-end gap-3">
                <a href="{{ route('teams.edit', $team) }}"
                   class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                    Edit Team
                </a>

                <form method="POST" action="{{ route('teams.destroy', $team) }}"
                      onsubmit="return confirm('Are you sure you want to delete this team?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Delete Team
                    </button>
                </form>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <div class="md:col-span-2 space-y-6">
            <h3 class="font-bold text-2xl text-gray-800">Community Reviews</h3>

            <div class="bg-white shadow rounded-lg divide-y divide-gray-100">
                @forelse($team->reviews as $review)
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <div class="flex items-center gap-3">
                                <div
                                    class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-sm">
                                    {{ substr($review->user?->name ?? 'U', 0, 1) }}
                                </div>
                                <span
                                    class="font-bold text-gray-900">{{ $review->user?->name ?? 'Unknown User' }}</span>
                            </div>
                            <span class="text-sm text-gray-500">{{ $review->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="mb-2 flex text-yellow-400 text-sm">
                            {{ str_repeat('★', $review->rating) }}<span
                                class="text-gray-300">{{ str_repeat('★', 5 - $review->rating) }}</span>
                        </div>

                        <p class="text-gray-600 leading-relaxed">{{ $review->body }}</p>
                    </div>
                @empty
                    <div class="p-8 text-center text-gray-500">
                        <p class="italic">No reviews yet. Be the first to share your thoughts!</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="md:col-span-1">
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-100 sticky top-6">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Leave a Review</h3>

                {{-- CHECK IF USER IS LOGGED IN --}}
                @auth
                    {{-- 1. SHOW FORM FOR LOGGED-IN USERS --}}
                    <form action="{{ route('reviews.store', $team->TeamID) }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <select name="rating"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                <option value="5">⭐⭐⭐⭐⭐ (Excellent)</option>
                                <option value="4">⭐⭐⭐⭐ (Good)</option>
                                <option value="3">⭐⭐⭐ (Average)</option>
                                <option value="2">⭐⭐ (Poor)</option>
                                <option value="1">⭐ (Terrible)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Comment</label>
                            <textarea name="body" rows="4" required placeholder="What did you think about this team?"
                                      class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <button type="submit"
                                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Post Review
                        </button>
                    </form>

                @else
                    {{-- 2. SHOW LOGIN PROMPT FOR GUESTS --}}
                    <div class="text-center py-4">
                        <div class="bg-gray-50 rounded-lg p-4 mb-4 border border-gray-200">
                            <p class="text-gray-600 text-sm mb-3">
                                You must be a member of the Guild to leave a review.
                            </p>
                            <div class="space-y-2">
                                <a href="{{ route('login') }}"
                                   class="block w-full text-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 transition-colors">
                                    Log In
                                </a>
                                <a href="{{ route('register') }}"
                                   class="block w-full text-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    Register
                                </a>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400">Join Floptopica to share your meta builds!</p>
                    </div>
                @endauth

            </div>
        </div>
    </div>

</x-layout>
