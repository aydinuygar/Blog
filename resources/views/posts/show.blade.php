@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="container">
        <h2 class="mt-3">{{ $post->title }}</h2>
        <p>{!! $post->content !!}</p>
    </div>
@endsection
