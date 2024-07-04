<!-- resources/views/partials/post_list.blade.php -->
@extends('layouts.dashboard_app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-inline-block">Posts</h4>
                        <a href="{{ route('posts.create') }}" class="btn btn-success float-end"> + New Post</a>
                    </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $post->created_at->format('d F Y') }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td class="text-end"> 
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        <div class="d-flex justify-content-center">
                            {!! $posts->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection