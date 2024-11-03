<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&family=Inter:wght@100..900&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="pb-20 text-white bg-black font-hanken-grotesk" >
    <div class="px-10 " >
        <nav class="flex items-center justify-between py-4 border-b border-white/10" >
            <div>
                <a href="/" >
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="" class=""  />
                </a>
            </div>
            <div class="space-x-6 font-bold " >
                <a href="/" >Jobs</a>
                <a href="/careers" >Careers</a>
                <a href="/salaries" >Salaries</a>
                <a href="/companies" >Companies</a>
            </div>

            @auth
                <div class="flex space-x-6 font-bold" >
                    <a href="/jobs/create" >Post Job</a>
                    <form method="POST" action="/logout" >
                        @csrf
                        @method("DELETE")
                        <button>Logout</button>
                    </form>
                    
                </div>
            @endauth
            @guest
                <div class="space-x-6 font-bold " > 
                    <a href="/login" >Login</a>
                    <a href="/register" >Sign up</a>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[1050px] mx-auto" >
            {{ $slot }}
        </main>
    </div>


</body>
</html>