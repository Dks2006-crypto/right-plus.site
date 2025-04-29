<x-app>
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="container mx-auto px-4 max-w-7xl">
            <div class="text-center mb-16">
                <h1 class="text-5xl font-bold text-gray-900 mb-4">Наша команда</h1>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Профессионалы с многолетним опытом в различных областях права</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach($lawyers as $lawyer)
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">
                    <div class="relative w-full h-72 bg-gradient-to-r from-blue-50 to-gray-50 flex items-center justify-center">
                        @if($lawyer->photo)
                        <img src="{{ asset('storage/' . $lawyer->photo) }}" alt="{{ $lawyer->name }}"
                            class="absolute inset-0 w-full h-full object-cover transition-opacity duration-300 hover:opacity-90">
                        @else
                        <div class="flex flex-col items-center">
                            <svg class="w-24 h-24 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <span class="mt-2 text-gray-400 text-sm">Фото отсутствует</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-8 flex-grow">
                        <div class="flex items-center mb-4">
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $lawyer->name }}</h3>
                                <p class="text-blue-600 font-medium mt-1">{{ $lawyer->specialization }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="text-gray-600">Стаж: <span class="font-medium">{{ $lawyer->experience }} лет</span></span>
                            </div>

                            @if($lawyer->education)
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span class="text-gray-600">{{ $lawyer->education }}</span>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="px-8 pb-8">
                        <a href="{{ route('team.person', $lawyer->id) }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors duration-200 shadow-sm">
                            Подробнее
                            <svg class="ml-2 -mr-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app>
