<x-app>
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
                <div class="flex flex-col md:flex-row gap-8">
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
                    <div class="md:w-2/3">
                        <h1 class="text-3xl font-bold">{{ $lawyer->name }}</h1>
                        <p class="text-blue-600 mt-2 text-xl">{{ $lawyer->specialization }}</p>
                        <p class="text-gray-500 mt-2">Стаж: {{ $lawyer->experience }} лет</p>

                        <div class="mt-6 prose max-w-none">
                            {!! $lawyer->biography !!}
                        </div>

                        <a href="{{ route('team.index') }}"
                            class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                            ← Назад к команде
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app>

<div
    class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow-sm md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">

    @if($lawyer->photo)
    <img src="{{ asset('storage/' . $lawyer->photo) }}" alt="{{ $lawyer->name }}"
        class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg">
    @else
    <svg class="w-20 h-20 text-gray-400 object-cover rounded-t-lg md:h-auto md:rounded-none md:rounded-s-lg" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    @endif
    <div class="flex flex-col justify-between p-4 leading-normal">
        <div class="flex gap-5">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $lawyer->name }}</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $lawyer->specialization }}</p>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Стаж: {{ $lawyer->experience }} лет</p>
        </div>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! $lawyer->bio !!}</p>
    </div>
</div>



