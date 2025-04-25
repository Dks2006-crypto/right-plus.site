<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <!-- Заголовок -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Почему клиенты выбирают нас
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300"
                :class="{ 'transform -translate-y-2 shadow-xl': hover }"
            >
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Гарантия конфиденциальности</h3>
                <p class="text-gray-600">
                    Все данные защищены NDA. Работаем по криптозащищенным каналам связи.
                </p>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300"
                :class="{ 'transform -translate-y-2 shadow-xl': hover }"
            >
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Срочная помощь 24/7</h3>
                <p class="text-gray-600">
                    Дежурный юрист ответит в течение 15 минут даже ночью.
                </p>
            </div>

            <div
                x-data="{ hover: false }"
                @mouseenter="hover = true"
                @mouseleave="hover = false"
                class="bg-white p-8 rounded-xl shadow-lg transition-all duration-300"
                :class="{ 'transform -translate-y-2 shadow-xl': hover }"
            >
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-3 text-gray-900">Победы в 95% дел</h3>
                <p class="text-gray-600">
                    Реальные кейсы с суммами выигрыша от 500 тыс. до 50 млн руб.
                </p>
            </div>
        </div>


    </div>
</section>
