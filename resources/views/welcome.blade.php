<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Code Challenge') }}</title>
    <link rel="icon" href="{{ asset('favicon.ico') }} " type="image/x-icon">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <main class="flex flex-col w-screen h-screen max-w-5xl mx-auto px-2">
        <div class="flex flex-col w-full h-full justify-center">
            <form method="POST" action="{{ route('student.store') }}" enctype="multipart/form-data"
                class="flex flex-col gap-4">
                @csrf
                <x-label :for="__('file_input')" :description="__('Download Excel Template')">
                    Upload from File
                </x-label>

                <x-input :error="__('file_input')" name='file_input' id="file_input" type="file" />
                <div class="flex justify-center gap-6">
                    <x-button type="submit">UPLOAD</x-button>
                    <x-button :style="__('secondary')" type="button">CANCEL</x-button>
                </div>

            </form>
            <section>@include('table')</section>
        </div>
    </main>
</body>

</html>