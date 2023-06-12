<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a class="" href="/">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7seUIn-ZqoA8PocgOZIvVkU2c-4mmra03ov-4vDGjDH2ucH1mWOU0OfHuCH0vSsxAwkM&usqp=CAU"
                    alt="mercado">
            </a>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
        <br>
        <a href="/">
            <button
                class="px-6 mx-5 py-2 font-medium tracking-wide capitalize bg-black-600 rounded-lg hover:bg-black-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                Home
            </button>

        </a>
    </div>
</body>

</html>