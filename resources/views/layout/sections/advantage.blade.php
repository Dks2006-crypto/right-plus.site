<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Почему клиенты выбирают нас
            </h2>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($adventages as $adventage)
                <x-card.adventage-card :adventage='$adventage'/>
            @endforeach
        </div>


    </div>
</section>
