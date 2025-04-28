@php
    use App\Models\Intro;

    $inroTitle = Intro::latest()->first()->title;
    $inroDescription = Intro::latest()->first()->description;
@endphp

<section aria-labelledby="intro-title" aria-describedby="intro-description"
    class="w-full h-full bg-no-repeat bg-cover bg-center "
    style="background-image: url({{ asset('images/intro-img.jpg') }})"
    x-data="{ isModalOpen: false }">

    <div class="grid w-full px-6 py-9 grid-cols-1 gap-4 md:grid-cols-3 pb-12 md:pb-[100px]">
        <div class="grid col-span-1 gap-y-6 md:col-span-2">
            <h1 class="font-bold text-white text-[36px] sm:text-[52px] leading-[64px] md:text-[80px] md:leading-[88px]"
                id="intro-title">{{$inroTitle}}</h1>
            <div class="text-[16px] sm:text-2xl font-normal text-white">
                <p id="intro-description">{{$inroDescription}}</p>
            </div>
            <ul class="flex gap-4">
                <li class="inline-flex">
                    <div
                        class="bg-white flex items-center gap-3 text-center text-black rounded-full px-[30px] py-[12px] border border-black font-semibold cursor-pointer">
                        <livewire:modal-trigger />
                        <span class="w-[20px] h-[20px] rounded-full bg-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="text-black size-3">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="m4.5 19.5 15-15m0 0H8.25m11.25 0v11.25" />
                            </svg>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-black py-[32px]">
        <div class="flex justify-evenly items-center gap-5 md:grid-cols-4 md:gap-[120px] text-white">
            @foreach ($introCards as $introCard)
                <x-card.intro-card :introCard="$introCard" />
            @endforeach
        </div>
    </div>

</section>
