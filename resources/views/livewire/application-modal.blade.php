<div>
    <!-- Кнопка для открытия (можно разместить в шапке сайта) -->
    <button
        wire:click="open"
        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
    >
        Записаться на консультацию
    </button>

    <!-- Модальное окно -->
    <div
    x-cloak
        x-show="$wire.isOpen"
        class="fixed inset-0 z-50 overflow-y-auto"
    >
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Фон -->
            <div
            wire:click="close"
            class="fixed inset-0 bg-gray-900 bg-opacity-50"
            ></div>

            <!-- Контент модалки -->
            <div
            x-show="open"
            x-transition
            class="relative mx-auto my-8 max-w-md bg-white rounded-lg shadow-xl"
            @click.outside="open = false"
            @keydown.escape.window="open = false">
                <!-- Заголовок -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 border-b">
                    <h3 class="text-lg font-medium text-gray-900">
                        Запись на консультацию
                    </h3>
                </div>

                <!-- Форма -->
                <form wire:submit.prevent="submit" class="px-6 py-4 space-y-4">
                    <!-- Имя клиента -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Ваше имя <span class="text-red-500">*</span>
                        </label>
                        <input
                            wire:model="name"
                            type="text"
                            id="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            required
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Телефон -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">
                            Телефон <span class="text-red-500">*</span>
                        </label>
                        <input
                            wire:model="phone"
                            type="tel"
                            id="phone"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            required
                        >
                        @error('phone')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input
                            wire:model="email"
                            type="email"
                            id="email"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            required
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Описание проблемы -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Опишите вашу ситуацию <span class="text-red-500">*</span>
                        </label>
                        <textarea
                            wire:model="description"
                            id="description"
                            rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                            required
                        ></textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                <!-- Футер -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse border-t">
                    <button
                        wire:click="submit"
                        type="button"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        <span wire:loading.remove wire:target="submit">Отправить заявку</span>
                        <span wire:loading wire:target="submit">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Отправка...
                        </span>
                    </button>
                    <button
                        wire:click="close"
                        type="button"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                    >
                        Отмена
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
