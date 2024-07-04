@extends('layouts.dashboard_app')

@section('content')

    <div class="jumbotron">
        <h1 class="display-4">Welcome!</h1>
        <p class="lead">This is a demo dashboard page for a blog management system.</p>
        <hr class="my-4">
        <p>From here, you can view your blog posts, create new posts, and edit existing ones.</p>
        <a class="btn btn-primary btn-lg" href="{{ route('posts.index') }}" role="button">View Posts</a>
    </div>

@endsection
