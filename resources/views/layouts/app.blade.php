<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
    <!-- Header content goes here -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">My Blog</a>
            <!-- Add more navigation links if needed -->
        </div>
    </nav>
</header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <!-- Sidebar content goes here -->
            <aside>
                <h2>Tags</h2>
                <ul>
                    @foreach($tags as $tag)
                        <li><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></li>
                    @endforeach
                </ul>
            </aside>
        </div>

        <div class="col-md-9">
            <!-- Main content goes here -->
            @yield('content')
        </div>
    </div>
</div>

<footer class="footer fixed-bottom py-3 bg-light">
    <!-- Footer content goes here -->
    <div class="text-center p-3">
        &copy; 2024 My Blog
    </div>
</footer>




<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>
