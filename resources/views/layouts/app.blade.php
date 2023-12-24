<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Page title dynamically set by child views -->
    <title>
        @yield('title')
    </title>

    <!-- Fonts from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap stylesheet from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Custom styles for the body -->
    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
</head>

<body>

<!-- Navbar with a link to the home page and a button to create tasks -->
<nav class="navbar navbar-light bg-light">
    <div class="container">
        <a href="/"><span class="navbar-brand mb-0 h1">Tasks</span></a>
        <a href="/create"><span class="btn btn-primary">Create Task</span></a>
    </div>
</nav>

<!-- Main content container with sections to be filled by child views -->
<div class="container">
    @yield('content') <!-- Content section dynamically set by child views -->

    <!-- Display success message if available in session -->
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

<!-- Script to hide flash message after 3 seconds -->
@if(session('status') === 'success')
    <script>
        setTimeout(function(){
            document.getElementById('flash-message').style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds
    </script>
@endif

</body>

</html>
