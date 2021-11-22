<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <meta name="p:domain_verify" content="41ae1d192f0f66ec3208a65d84f7a8d7"/>
    <script data-ad-client="ca-pub-1791165165288702" async
            src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">

    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-186028539-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-186028539-1');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Mentoring Heroes') }}</title>
    <link rel="shortcut icon" href="{{asset('images/journey.svg')}}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

@livewireStyles

<!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</head>


<body class="bg-white font-family-karla">

<!-- Top Bar Nav -->
<nav class="w-full py-4 bg-blue-800 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">

        <nav>
            <ul class="flex items-center justify-between font-bold text-sm text-white uppercase no-underline">
                <li>
                    <a class="hover:text-gray-200 hover:underline px-4"
                       href="{{route('about')}}">
                        About
                    </a>
                </li>
                <li>
                    <a class="hover:text-gray-200 hover:underline px-4"
                       href="{{route('contact')}}">
                        Contact Us
                    </a>
                </li>
            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <div class="hidden md:block flex items-center text-lg no-underline text-white pr-6">
                <a class="" href="https://www.pinterest.com/mentoringheroes/">
                    <i class="fab fa-pinterest"></i>
                </a>
                <a class="invisible pl-6" href="https://www.facebook.com/mentoringheroes">
                    <i class="fab fa-facebook fa-lg"></i>
                </a>
                <a class="invisible pl-6" href="https://www.instagram.com/mentoringheroes">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
                <a class="invisible pl-6" href="https://www.twitter.com/heromentoring">
                    <i class="fab fa-twitter fa-lg"></i>
                </a>
            </div>
        </div>
    </div>

</nav>

<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-6">
        <a class="font-bold text-gray-800 uppercase hover:text-gray-700 text-5xl" href="#">
            Mentoring Heroes
        </a>
        <p class="text-lg text-gray-600">
            Here to guide you along your hero's Journey
        </p>
    </div>


    <div class="flex flex-col items-center">
        <a class="text-2xl font-bold text-white uppercase hover:text-red-700 md:text-5xl" href="#">

        </a>
        <p class="hidden md:block text-lg text-white">

        </p>
    </div>

</header>


{{$slot}}



<footer class="w-full py-3 border-t border-b bg-gray-100">
    <div class="w-full container mx-auto flex flex-col items-center">
        <div class="flex flex-col md:flex-row text-center md:text-left md:justify-between py-6">
            <a href="{{route('about')}}" class="uppercase px-3">About Us</a>
            <a href="https://www.freeprivacypolicy.com/live/107b39da-e3fd-43d9-b1ea-823c4927ce71"
               class="uppercase px-3"
            >
                Privacy Policy
            </a>
            <a href="https://www.termsfeed.com/live/59f27ac2-35aa-4d47-9641-62a0961d2d8b"
               class="uppercase px-3">
                Terms & Conditions
            </a>
            <a href="{{route('contact')}}" class="uppercase px-3">Contact Us</a>
        </div>
        <div class="uppercase pb-6">&copy; <a href="{{route('posts.index')}}">mentoringheroes.com</a></div>
    </div>
</footer>


@livewireScripts
</body>

{{--Facebook Script--}}
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '501721350953878',
            xfbml: true,
            version: 'v10.0'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</html>
