<?php
use \Illuminate\Support\Facades\Auth;
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Reservations</title>
</head>
<body class="bg-secondary">

<!-- Authentication vars -->
@php($loggedIn = \Illuminate\Support\Facades\Auth::check())
@if($loggedIn)
    @php($user = \Illuminate\Support\Facades\Auth::user())
@endif

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/"><strong>Sundown Boulevard</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                @if($loggedIn)
                    <li class="nav-item">
                        <a class="nav-link" href="/user/reservation">Make a Reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/reservations">My Reservations</a>
                    </li>
                    @if($user->is_admin)
                        <li class="nav-item">
                            <a class="nav-link" href="/reservations">All Reservations</a>
                        </li>
                    @endif
                @endif
            </ul>
            @if($loggedIn)
                <span class="navbar-text p-2">
                    {{ $user->name }} is Logged In
                </span>
            @endif
            @if($loggedIn)
                <form class="form-inline" action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                </form>
            @else
                <span>
                    <a class="btn btn-sm btn-info" href="/register">Register</a>
                    <a class="btn btn-sm btn-primary" href="/login">Login</a>
                </span>
            @endif
        </div>
    </div>
</nav>
<div class="container bg-light">
    <br>
    @yield('content')
    <br>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>
