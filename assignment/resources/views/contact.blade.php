<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen">
    <div class="px-5 py-24 mx-auto flex items-center justify-center bg-slate-800 min-h-screen w-full">
        <form class="lg:w-1/3 md:w-1/2 bg-white rounded-lg p-8 md:mx-auto w-full relative z-10 shadow-md" method="post">
            @csrf
            <h2 class="text-gray-900 mb-1 font-medium title-font text-3xl text-center">Contact Form</h2>
            <div class="relative mb-4">
                <label for="name" class="leading-7 text-sm text-gray-600">Name</label>
                <input type="text" id="name" name="name"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    value="{{ old('name', $name ?? '') }}">
                @error('name')
                    <span class=" text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
                <input type="email" id="email" name="email"
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    value="{{ old('email', $email ?? '') }}">
                @error('email')
                    <span class=" text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="relative mb-4">
                <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                <textarea
                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                    name="message" id="message" cols="30" rows="10">{{ old('message', $message ?? '') }}</textarea>
                @error('message')
                    <span class=" text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg block mx-auto">Contact
                us</button>
        </form>
    </div>
</body>

</html>
