

<x-app-layout>
    <x-slot name="header">

        <div class="m-home-content-header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div>@yield('title')</div>
            </h2>
            <div class="m-badge">
                <div class="m-icon-badge">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="m-message-badge">
                    1
                </div>
        </div>
        </div>

    </x-slot>

            <div class="home-container">

                @yield('content-all')
                

            </div>

            <script type="text/javascript">
                let backgroundBreadcrumbs = document.querySelector(".bg-gray-300");
                backgroundBreadcrumbs.classList.remove("bg-gray-300")
            </script>

</x-app-layout>
