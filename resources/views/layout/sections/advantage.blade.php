<section class="py-20 bg-gradient-to-b from-gray-50 to-gray-100">
    <div class="container mx-auto px-4 max-w-7xl">
        <!-- Заголовок с анимацией -->
        <div class="text-center mb-16 animate-fade-in">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">
                Почему клиенты выбирают нас
            </h2>
            <div class="relative inline-block">
                <div class="w-32 h-2 bg-blue-600 rounded-full mb-1"></div>
                <div class="w-32 h-2 bg-blue-400 rounded-full opacity-60 absolute top-1 left-2"></div>
            </div>
            <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
                Наши ключевые преимущества, которые выделяют нас среди конкурентов
            </p>
        </div>

        <!-- Карточки преимуществ -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($adventages as $adventage)
            <div x-data="{ hover: false }" @mouseenter="hover = true" @mouseleave="hover = false"
                class="relative group overflow-hidden bg-white p-8 rounded-2xl shadow-lg transition-all duration-500 h-full"
                :class="{ 'transform -translate-y-3 shadow-2xl': hover }">

                <!-- Анимированный фон при наведении -->
                <div
                    class="absolute inset-0 bg-gradient-to-br from-blue-50 to-white opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                </div>

                <!-- Иконка с анимацией -->
                <div class="relative z-10 w-20 h-20 bg-white group-hover:bg-blue-100 rounded-full flex items-center justify-center mb-6 transition-all duration-500 shadow-sm group-hover:shadow-inner"
                    :class="{ 'ring-4 ring-blue-200': hover }">
                    @if ($adventage->image)
                    <img class="w-10 h-10 transition-transform duration-500 group-hover:scale-110"
                        src="{{asset('storage/' . $adventage->image)}}" alt="{{$adventage->title}}">
                    @else
                    <i class='text-4xl bx bx-time transition-all duration-500'
                        :class="{ 'text-blue-600': hover, 'text-blue-400': !hover }"></i>
                    @endif
                </div>

                <!-- Контент -->
                <div class="relative z-10">
                    <h3
                        class="text-2xl font-bold mb-4 text-gray-900 group-hover:text-blue-800 transition-colors duration-300">
                        {{$adventage->title}}
                    </h3>
                    <p class="text-gray-600 group-hover:text-gray-800 transition-colors duration-300 leading-relaxed">
                        {{$adventage->description}}
                    </p>
                </div>

                <!-- Декоративный элемент -->
                <div
                    class="absolute bottom-0 left-0 right-0 h-1 bg-blue-600 transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500">
                </div>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center">
            <div
                class="text-center mt-16 animate-fade-in inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-full shadow-lg hover:shadow-xl">
                <livewire:modal-trigger />
                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                    </path>
                </svg>
            </div>
        </div>
    </div>
</section>

<style>
    .animate-fade-in {
        opacity: 0;
        animation: fadeIn 1s ease-out forwards;
    }

    .animate-fade-in.delay-500 {
        animation-delay: 500ms;
    }

    @keyframes fadeIn {
        to {
            opacity: 1
        }
    }
</style>
