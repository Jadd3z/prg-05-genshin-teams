<x-layout>
    <x-slot:heading>
        The Floptopica Guild ⚔️
    </x-slot:heading>

    <div class="space-y-20">

        {{-- 1. HERO SECTION: "Ad Astra Abyssosque" Theme --}}
        <div class="relative text-center py-16 overflow-hidden">
            <div
                class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-full opacity-10 pointer-events-none">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#8B5CF6"
                          d="M44.7,-76.4C58.9,-69.2,71.8,-59.1,79.6,-46.3C87.4,-33.5,90.1,-18,88.4,-2.9C86.7,12.2,80.6,26.9,71.1,38.9C61.6,50.9,48.7,60.2,34.8,66.6C20.9,73,6,76.5,-8.3,75.4C-22.6,74.3,-36.3,68.6,-48.5,60.6C-60.7,52.6,-71.4,42.3,-78.4,29.8C-85.4,17.3,-88.7,2.6,-85.4,-11.1C-82.1,-24.8,-72.2,-37.5,-60.6,-46.8C-49,-56.1,-35.7,-62,-22.3,-67.8C-8.9,-73.6,4.6,-79.3,18.5,-80.6L30.5,-83.6Z"
                          transform="translate(100 100)"/>
                </svg>
            </div>

            <h2 class="relative text-5xl font-extrabold text-gray-900 tracking-tight sm:text-6xl">
                Ad Astra <span class="text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500">Floptopica</span>
            </h2>
            <p class="mt-6 max-w-2xl mx-auto text-xl text-gray-500 font-medium">
                Welcome to the Adventurers' Guild. Whether you're a whale 🐳 or F2P, we help you manage your parties and
                clear the Spiral Abyss of productivity.
            </p>
        </div>

        {{-- 2. STATS (Elemental Reactions) --}}
        <div class="grid grid-cols-2 gap-6 md:grid-cols-4 text-center">
            <div
                class="bg-teal-50 rounded-2xl p-6 border border-teal-100 transform hover:scale-105 transition-transform">
                <div class="text-teal-500 text-sm font-bold uppercase tracking-widest mb-1">Travelers</div>
                <dd class="text-4xl font-black text-teal-700">10k+</dd>
            </div>
            <div class="bg-red-50 rounded-2xl p-6 border border-red-100 transform hover:scale-105 transition-transform">
                <div class="text-red-500 text-sm font-bold uppercase tracking-widest mb-1">Damage Dealt</div>
                <dd class="text-4xl font-black text-red-700">9M</dd>
            </div>
            <div
                class="bg-purple-50 rounded-2xl p-6 border border-purple-100 transform hover:scale-105 transition-transform">
                <div class="text-purple-500 text-sm font-bold uppercase tracking-widest mb-1">Energy Recharge</div>
                <dd class="text-4xl font-black text-purple-700">200%</dd>
            </div>
            <div
                class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100 transform hover:scale-105 transition-transform">
                <div class="text-yellow-600 text-sm font-bold uppercase tracking-widest mb-1">Shield Strength</div>
                <dd class="text-4xl font-black text-yellow-700">MAX</dd>
            </div>
        </div>

        {{-- 3. THE "BEST TEAMS" SECTION (Meta Commentary) --}}
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100">
            <div class="px-6 py-12 md:px-12 text-center">
                <h3 class="text-3xl font-bold text-gray-900 mb-4">Build Your Dream Team</h3>
                <p class="text-gray-500 mb-10 max-w-2xl mx-auto">
                    Just like in Teyvat, synergy is everything. Floptopica helps you organize your squad so you can
                    trigger the perfect Elemental Reactions.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-left">

                    {{-- Team 1: Rational (Efficiency) --}}
                    <div
                        class="group relative bg-gradient-to-b from-blue-50 to-white p-6 rounded-2xl border border-blue-100 hover:shadow-lg transition-all">
                        <div class="absolute top-4 right-4 text-2xl">⚡️🔥</div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">The "Rational" Squad</h4>
                        <p class="text-sm text-gray-600 mb-4">Perfect for teams that need high energy recharge and
                            constant bursts. Fast, efficient, and breaks through any shield.</p>
                        <div class="flex -space-x-2 overflow-hidden">
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-purple-500 flex items-center justify-center text-white text-xs font-bold">R</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-red-500 flex items-center justify-center text-white text-xs font-bold">X</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-blue-500 flex items-center justify-center text-white text-xs font-bold">Y</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-red-600 flex items-center justify-center text-white text-xs font-bold">B</span>
                        </div>
                    </div>

                    {{-- Team 2: Freeze (Stability) --}}
                    <div
                        class="group relative bg-gradient-to-b from-cyan-50 to-white p-6 rounded-2xl border border-cyan-100 hover:shadow-lg transition-all">
                        <div class="absolute top-4 right-4 text-2xl">❄️💧</div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">The "Perma-Freeze"</h4>
                        <p class="text-sm text-gray-600 mb-4">For projects that need stability. Lock down your
                            requirements and keep the bugs frozen in place. Critical rate: 100%.</p>
                        <div class="flex -space-x-2 overflow-hidden">
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-cyan-300 flex items-center justify-center text-white text-xs font-bold">A</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-blue-400 flex items-center justify-center text-white text-xs font-bold">K</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-teal-400 flex items-center justify-center text-white text-xs font-bold">K</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-cyan-600 flex items-center justify-center text-white text-xs font-bold">S</span>
                        </div>
                    </div>

                    {{-- Team 3: Hyperbloom (New Tech) --}}
                    <div
                        class="group relative bg-gradient-to-b from-green-50 to-white p-6 rounded-2xl border border-green-100 hover:shadow-lg transition-all">
                        <div class="absolute top-4 right-4 text-2xl">🌿⚡️</div>
                        <h4 class="text-xl font-bold text-gray-900 mb-2">Hyperbloom Core</h4>
                        <p class="text-sm text-gray-600 mb-4">Low investment, high return. The modern meta for startups
                            that need to deal massive damage with minimal resources.</p>
                        <div class="flex -space-x-2 overflow-hidden">
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-green-500 flex items-center justify-center text-white text-xs font-bold">N</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-purple-600 flex items-center justify-center text-white text-xs font-bold">K</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-blue-500 flex items-center justify-center text-white text-xs font-bold">X</span>
                            <span
                                class="inline-block h-8 w-8 rounded-full ring-2 ring-white bg-green-700 flex items-center justify-center text-white text-xs font-bold">Y</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</x-layout>
