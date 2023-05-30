<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Welcome</title>
</head>

<body>
    <header class="text-gray-600 body-font shadow-md">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full"
                    viewBox="0 0 24 24">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
            </a>
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a class="mr-5 hover:text-gray-900" href="{{ url('/') }}">Welcome</a>
                <a class="mr-5 hover:text-gray-900" href="{{ url('/register') }}">Register</a>
                <a class="mr-5 hover:text-gray-900" href="{{ url('/home') }}">Dashboard</a>
                <a class="mr-5 hover:text-gray-900"
                    href="{{ url('/profile??email=tufikhasan05@gmail.com&password=12345') }}">Profile</a>
                <a class="mr-5 hover:text-gray-900"
                    href="{{ url('/settings?email=tufikhasan05@gmail.com&password=12345') }}">Settings</a>
                href="{{ url('/profile??email=tufikhasan05@gmail.com&password=12345') }}">Profile</a>
                <a class="mr-5 hover:text-gray-900"
                    href="{{ url('/settings?email=tufikhasan05@gmail.com&password=12345') }}">Settings</a>
                <a class="mr-5 hover:text-gray-900" href="{{ url('/contact') }}">Contact</a>
            </nav>
        </div>
    </header>
    <section class="px-5 py-24 mx-auto flex items-center justify-center min-h-[70vh] w-full">
        <h1 class="text-3xl font-medium">Welcome to Laravel!</h1>
    </section>
</body>

</html>
