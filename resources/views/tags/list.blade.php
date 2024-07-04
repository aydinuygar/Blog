@extends('layouts.dashboard_app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-inline-block">Tags</h4>
                        <a href="{{ route('tags.create') }}" class="btn btn-success float-end"> + New Tag</a>
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
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->created_at->format('d F Y') }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td class="text-end"> 
                                            <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('tags.posts.index', $tag->id) }}" class="btn btn-secondary">Posts</a>
                                            <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tag?')">Delete</button>
                                            </form>
                                           
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {!! $tags->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
