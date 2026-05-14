<!DOCTYPE html>
<html lang="en">
@props(['title', 'keywords', 'description', 'image'])
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? "कटुञ्जे दैनिक | गृहपृष्ठ" }}</title>

    <meta name="description" content="{{$description ?? ''}}">
    <meta name="keywords" content="{{$keywords ?? ''}}">

    <meta property="og:image" content="{{$image ?? ''}}">
    <meta property="og:title" content="{{$title ?? ''}}">
    <meta property="og-url" content="{{ url()->current() }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/frontend/style.css">
    
    <style>
        body{
            user-select:text;
        }
    </style>
</head>
<body>
    <x-frontend-header/>

    <main>
        {{ $slot }}
    </main>

    <x-frontend-footer/>
</body>
</html>