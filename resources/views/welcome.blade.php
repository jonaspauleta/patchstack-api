<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Patchstack API</title>

        @vite('resources/css/app.css')
    </head>
    <body>
        <div class="flex items-center justify-center h-screen bg-[#17191e]">
            <img src="/storage/logo.svg" alt="Patchstack Logo" class="w-2/3">
        </div>
    </body>
</html>
