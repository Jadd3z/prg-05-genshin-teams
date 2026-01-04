<x-layout>
    <x-slot:heading>
        Welcome to Floptopica
    </x-slot:heading>

    <div class="space-y-16">

        {{-- 1. HERO SECTION --}}
        <div class="relative bg-gray-900 rounded-3xl overflow-hidden shadow-2xl">
            <div class="absolute inset-0">
                <img
                    src="https://images.unsplash.com/photo-1519074069444-1ba4fff66d16?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80"
                    alt="Starry Sky"
                    class="w-full h-full object-cover opacity-30">
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/90 to-purple-900/80"></div>
            </div>

            <div class="relative px-6 py-16 sm:px-12 sm:py-24 text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl mb-6">
                    Master the <span class="text-yellow-400">Spiral Abyss</span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-indigo-100">
                    The ultimate Genshin Impact team builder. Create your dream parties, share your meta builds, and
                    discover what other Travelers are using to clear Floor 12.
                </p>

                <div class="mt-10 flex justify-center gap-4">
                    <a href="/teams"
                       class="px-8 py-3 border border-transparent text-base font-bold rounded-full text-indigo-700 bg-white hover:bg-gray-50 md:py-4 md:text-lg md:px-10 transition-all shadow-[0_0_20px_rgba(255,255,255,0.3)]">
                        Browse Teams
                    </a>
                    @guest
                        <a href="{{ route('register') }}"
                           class="px-8 py-3 border border-transparent text-base font-bold rounded-full text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition-all">
                            Join the Guild
                        </a>
                    @endguest
                </div>
            </div>
        </div>

        {{-- 2. "WHAT CAN YOU DO?" FEATURE GRID --}}
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 mb-12">Your Adventure Guide</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                    <div class="w-14 h-14 bg-red-100 rounded-xl flex items-center justify-center mx-auto mb-6 text-2xl">
                        ⚔️
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Build Your Squad</h3>
                    <p class="text-gray-500">
                        Mix and match characters to create the perfect Elemental Reactions. From Vaporize to Aggravate,
                        visualize your synergy before you invest resources.
                    </p>
                </div>

                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-blue-100 rounded-xl flex items-center justify-center mx-auto mb-6 text-2xl">
                        🔮
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Discover Meta</h3>
                    <p class="text-gray-500">
                        Stuck on a domain? Browse teams created by other players. See which artifacts and weapon combos
                        are currently dominating the meta.
                    </p>
                </div>

                <div
                    class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition-shadow">
                    <div
                        class="w-14 h-14 bg-purple-100 rounded-xl flex items-center justify-center mx-auto mb-6 text-2xl">
                        ✨
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Showcase Builds</h3>
                    <p class="text-gray-500">
                        Proud of your C6 Bennett? Publish your teams for the community to see. Get feedback and help
                        newer players optimize their setups.
                    </p>
                </div>

            </div>
        </div>

        {{-- 3. USER ACTION CENTER (Conditional Logic) --}}
        <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 text-center">
            @auth
                {{-- IF USER IS LOGGED IN --}}
                <h3 class="text-2xl font-bold text-gray-900">Welcome back, Traveler!</h3>
                <p class="text-gray-500 mt-2 mb-6">Your adventure continues. Ready to update your roster?</p>

                <div class="flex justify-center items-center gap-6">
                    <a href="/profile" class="text-indigo-600 font-semibold hover:text-indigo-500 hover:underline">
                        View Profile
                    </a>
                    <span class="text-gray-300">|</span>

                    {{-- Logout Form styled as a link --}}
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit"
                                class="text-red-500 font-semibold hover:text-red-700 hover:underline bg-transparent border-none cursor-pointer">
                            Log Out
                        </button>
                    </form>
                </div>

            @else
                {{-- IF USER IS A GUEST --}}
                <h3 class="text-2xl font-bold text-gray-900">Begin Your Journey</h3>
                <p class="text-gray-500 mt-2 mb-6">Log in to save your teams and vote on community builds.</p>

                <div class="flex justify-center gap-4">
                    <a href="{{ route('login') }}"
                       class="bg-white text-gray-700 border border-gray-300 px-6 py-2 rounded-lg font-medium hover:bg-gray-50 transition-colors">
                        Log In
                    </a>
                    <a href="{{ route('register') }}"
                       class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-indigo-700 transition-colors shadow-md">
                        Register Account
                    </a>
                </div>
            @endauth
        </div>

    </div>
</x-layout>
