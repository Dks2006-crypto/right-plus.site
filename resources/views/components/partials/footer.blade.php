<footer class="footer footer-horizontal footer-center bg-base-100 shadow-sm text-base-content rounded p-10">
    <nav class="grid grid-flow-col gap-4">
        <a href="{{route('home.page')}}" class="lg:text-[18px] text-[16px]">Главная</a>
        <a href="{{route('team.index')}}" class="lg:text-[18px] text-[16px]">Наша команда</a>
        <livewire:modal-trigger />
    </nav>
    <aside>
        <p>Авторские права © 2025 - Все права защищены</p>
    </aside>
        <livewire:application-modal />
</footer>
