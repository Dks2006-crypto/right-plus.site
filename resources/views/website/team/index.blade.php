<x-app>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl font-bold text-center mb-12">Наша команда</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($lawyers as $lawyer)
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative w-full h-64 bg-gray-200 flex items-center justify-center">
                        @if($lawyer->photo)
                        <img src="{{ asset('storage/' . $lawyer->photo) }}" alt="{{ $lawyer->name }}"
                            class="absolute inset-0 w-full h-full object-cover">
                        @else
                        <svg class="w-20 h-20 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        @endif
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold">{{ $lawyer->name }}</h3>
                        <p class="text-blue-600 mt-2">{{ $lawyer->specialization }}</p>
                        <p class="text-gray-500 mt-2">Стаж: {{ $lawyer->experience }} лет</p>
                        <a href="{{ route('team.person', $lawyer->id) }}"
                            class="mt-4 inline-block text-blue-600 hover:underline">
                            Подробнее →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app>
