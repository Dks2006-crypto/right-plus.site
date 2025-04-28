<x-app>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-8">
                    <!-- Левая колонка (фото) -->
                    <div class="md:w-1/3">
                        <div class="relative w-full h-64 bg-gray-200 rounded-lg overflow-hidden mb-4">
                            @if($lawyer->photo)
                            <img src="{{ asset('storage/' . $lawyer->photo) }}" alt="{{ $lawyer->name }}"
                                class="absolute inset-0 w-full h-full object-cover">
                            @else
                            <svg class="w-full h-full text-gray-400 p-8" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            @endif
                        </div>

                        <!-- Кнопка записи -->
                        <livewire:lawyer-appointment-button :lawyer="$lawyer"
                            :buttonClass="'w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 transition'" />
                    </div>

                    <!-- Правая колонка (информация) -->
                    <div class="md:w-2/3">
                        <h1 class="text-3xl font-bold">{{ $lawyer->name }}</h1>
                        <p class="text-blue-600 mt-2 text-xl">{{ $lawyer->specialization }}</p>

                        <div class="mt-6 grid grid-cols-2 gap-4">
                            <div>
                                <p class="text-gray-500">Стаж:</p>
                                <p class="text-lg">{{ $lawyer->experience }} лет</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Образование:</p>
                                <p class="text-lg">{{ $lawyer->education ?? 'Не указано' }}</p>
                            </div>
                        </div>

                        <!-- Сертификаты -->
                        @if($lawyer->certificates)
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold mb-2">Сертификаты</h3>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach($lawyer->certificates as $certificate)
                                <a href="{{ asset('storage/' . $certificate) }}" target="_blank"
                                    class="border rounded-lg p-2 hover:bg-gray-50">
                                    <img src="{{ asset('storage/' . $certificate) }}" alt="Сертификат"
                                        class="w-full h-32 object-contain">
                                    <p class="text-center mt-2 text-sm">Сертификат {{ $loop->iteration }}</p>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Биография -->
                        <div class="mt-6">
                            <h3 class="text-xl font-semibold mb-2">О юристе</h3>
                            <div class="prose max-w-none">
                                {!! $lawyer->biography !!}
                            </div>
                        </div>

                        <a href="{{ route('team.index') }}"
                            class="mt-6 inline-block bg-gray-200 text-gray-800 px-6 py-2 rounded-lg hover:bg-gray-300">
                            ← Назад к команде
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app>
