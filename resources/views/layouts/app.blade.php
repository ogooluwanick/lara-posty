<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="logo icon.png">
        <title>Posty</title>
        @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
        <nav class="p-6 bg-white flex justify-between">
                <ul class="flex items-center">
                        <li>
                                <a href={{route("home")}}  class="p-3">HOME</a>
                        </li>
                        <li>
                                <a href={{route("dashboard")}} class="p-3">DASHBOARD</a>
                        </li>
                        <li>
                                <a href={{route("posts")}}  class="p-3">POST</a>
                        </li>
                </ul>

                <ul class="flex items-center">
                        @auth
                                <li>
                                        <a href="" class="p-3">{{explode(" ",auth()->user()->name)[0]}}</a>
                                </li>
                                <li>
                                        <form action={{route("logout")}} method="POST" class="inline ">
                                                @csrf
                                                <button type="submit" class="p-3">
                                                        Logout
                                                </button>
                                        </form>
                                </li>
                        @endauth
                        @guest
                                <li>
                                        <a href={{route("login")}} class="p-3">Login</a>
                                </li>
                                <li>
                                        <a href={{ route('register') }} class="p-3">Register</a>
                                </li>
                        @endguest
                        
                        
                       
                        
                </ul>
        </nav>
        @yield("content")
</body>
</html>