<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simolis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- PWA  -->
    <meta name="theme-color" content="#254336" />
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body class="bg-base-200">
    <header>
        <nav class="p-5 bg-[#436850] shadow md:flex md:justify-between md:items-center">
            <div class="flex justify-between items-center text-white">
                <a href="{{ route('index-page') }}">
                    <span class="text-2xl cursor-pointer font-[Poppins] font-semibold">
                        SIMOLIS
                    </span>
                </a>
                <span class="text-3xl cursor-pointer md:hidden block mx-2">
                    <i class="fa-solid fa-bars" class="menu" onclick="Menu(this)"></i>
                </span>
            </div>
            @yield('navbar')
        </nav>
    </header>
    <section>
        @yield('hero')
    </section>
    <main class="p-5 bg-base-300">
        @yield('content')
    </main>


    <footer class="bg-[#436850] p-5 text-center">
        <p class="text-[16px] lg:text-[20px] font-[Poppins] text-white">Politeknik Negeri Jakarta - 2024</p>
    </footer>

    <script src="https://kit.fontawesome.com/3cfd8eaa87.js" crossorigin="anonymous"></script>
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if ("serviceWorker" in navigator) {
            // Register a service worker hosted at the root of the
            // site using the default scope.
            navigator.serviceWorker.register("/sw.js").then(
                (registration) => {
                    console.log("Service worker registration succeeded:", registration);
                },
                (error) => {
                    console.error(`Service worker registration failed: ${error}`);
                },
            );
        } else {
            console.error("Service workers are not supported.");
        }
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
