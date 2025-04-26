<div>

    @if($isOpen)
        <div class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen p-4">
                <div class="fixed inset-0 bg-black bg-opacity-50" wire:click="closeModal"></div>

                <div class="relative bg-white rounded-lg shadow-xl w-full max-w-md mx-auto">
                    <div class="px-6 py-4 border-b flex justify-between items-center">
                        <h3 class="text-lg font-medium">Запись на консультацию</h3>
                        <button wire:click="closeModal" class="text-gray-500 hover:text-gray-700">
                            ✕
                        </button>
                    </div>

                    <form wire:submit.prevent="submit" class="p-6 space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Ваше имя *</label>
                            <input wire:model="form.name" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('form.name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Поле Телефон -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Телефон *</label>
                            <input wire:model="form.phone" type="tel" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('form.phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Поле Email -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email *</label>
                            <input wire:model="form.email" type="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            @error('form.email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Описание проблемы *</label>
                            <textarea wire:model="form.description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"></textarea>
                            @error('form.description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-end gap-4 pt-4">
                            <button type="button" wire:click="closeModal" class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded">
                                Отмена
                            </button>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Отправить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @livewireScripts
    @if(session('success'))
        <div x-data="{ show: true }"
             x-show="show"
             x-init="setTimeout(() => show = false, 3000)"
             class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif
</div>
