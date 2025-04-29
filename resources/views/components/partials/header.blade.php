@php

    use App\Models\Setting;

    $siteName = Setting::latest()->first()->name;

    $siteDesc = Setting::latest()->first()->description;

@endphp

<header>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">{{ $siteName ?? env('APP_NAME') }}</a>
        </div>

        <div class="hidden lg:flex flex-none">
            <ul class="menu menu-horizontal px-1 space-x-2">
                <li>
                    <a href="{{route('home.page')}}" class="lg:text-[18px] text-[16px]">Главная</a>
                </li>
                <li>
                    <a href="{{route('team.index')}}" class="lg:text-[18px] text-[16px]">Наша команда</a>
                </li>
                <li>
                    <livewire:modal-trigger />
                </li>
            </ul>
        </div>

        <div class="lg:hidden flex-none">
            <button class="btn btn-square btn-ghost" onclick="document.getElementById('mobile-menu').showModal()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block w-5 h-5 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </button>

            <dialog id="mobile-menu" class="modal">
                <div class="modal-box bg-base-100">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                    </form>
                    <ul class="menu p-4 w-full">
                        <li>
                            <a href="{{route('home.page')}}" class="lg:text-[18px] text-[16px] py-3">Главная</a>
                        </li>
                        <li>
                            <a href="{{route('team.index')}}" class="lg:text-[18px] text-[16px] py-3">Наша команда</a>
                        </li>
                        <li>
                            <div class="lg:hidden px-0">
                                <button onclick="document.getElementById('mobile-menu').close()">
                                    <livewire:modal-trigger />
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>Закрыть</button>
                </form>
            </dialog>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('openApplicationModal', () => {
                document.getElementById('mobile-menu').close();
            });
        });
    </script>

</header>
