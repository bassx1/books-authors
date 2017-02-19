<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>

    <link rel="stylesheet" href="/css/app.css">

    @stack('styles')

</head>
<body>


<nav class="navbar navbar-default ">
    <div class="container">
        <ul class="nav navbar-nav">

            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">Home</a>
            </li>

            <li class="{{ Request::is('books*') ? 'active' : '' }}">
                <a href="{{ route('books.index') }}">Books</a>
            </li>
            <li class="{{ Request::is('authors*') ? 'active' : '' }}">
                <a href="{{ route('authors.index') }}">Authors</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container container--small">
    @yield('content')
</div>

<script src="/js/index.js"></script>
<script
        src="https://code.jquery.com/jquery-3.1.1.min.js"
        integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>

@stack('scripts')

</body>
</html>