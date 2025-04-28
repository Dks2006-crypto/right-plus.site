<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body class=" bg-slate-100">
    @livewireStyles
    <div class="max-w-[1440px] gap-y-32 px-4 mx-auto grid grid-rows-[auto_1fr_auto] min-h-screen">
        @include('components.partials.header')
        @include('layout.sections.intro')
        @include('layout.sections.advantage')
        @include('components.partials.footer')
    </div>
    <livewire:application-modal />

    @livewireScripts

    <script>
        document.addEventListener('livewire:initialized', () => {
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    Livewire.dispatch('closeModal');
                }
            });

            Livewire.on('openApplicationModal', () => {
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu?.close) mobileMenu.close();
            });
        });

    </script>
</body>

</html>
