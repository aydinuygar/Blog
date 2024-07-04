@extends('layouts.app')

@section('title', 'Welcome to My Blog')

@section('content')

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($post->photo)
                        <img src="{{ asset('uploads/' . $post->photo) }}" class="card-img-top" alt="Post Image">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>

@endsection
