<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', 'Tasks')</title>

        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/tasks-drag.js'])

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    </head>
    <body class="bg-gray-100 min-h-screen">

        <main class="container mx-auto px-4 py-8">
            @yield('content')
        </main>

        <script>
            window.Laravel = {
                csrfToken: $('meta[name="csrf-token"]').attr('content'),
            }
        </script>

    @stack('scripts')
    </body>
</html>
