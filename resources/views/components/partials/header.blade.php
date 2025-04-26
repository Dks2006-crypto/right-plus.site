<header>
    <div class="navbar bg-base-100 shadow-sm">
        <div class="flex-1">
            <a class="btn btn-ghost text-xl">Право+</a>
        </div>

        <div class="hidden lg:flex flex-none">
            <ul class="menu menu-horizontal px-1 space-x-2">
                <li>
                    <a class="text-[18px]">Главная</a>
                </li>
                <li>
                    <a class="text-[18px]">Наша команда</a>
                </li>
                <li>
                    <button class="text-[18px]"
                        type="button">Консультация</button>
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
                            <a class="text-[18px] py-3">Главная</a>
                        </li>
                        <li>
                            <a class="text-[18px] py-3">Наша команда</a>
                        </li>
                        <li>
                            <a onclick="document.getElementById('mobile-menu').close" class="text-[18px]">Консультация</a>
                        </li>
                    </ul>
                </div>
                <form method="dialog" class="modal-backdrop">
                    <button>Закрыть</button>
                </form>
            </dialog>
        </div>
        <livewire:application-modal />
    </div>
</header>
