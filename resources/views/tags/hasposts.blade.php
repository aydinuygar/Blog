@extends('layouts.dashboard_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="d-inline-block">Posts of {{ $tag->name }}</h4>
                    </div>

                    <div class="card-body">
                        <!-- Gönderilerin listesi -->
                        <form action="{{ route('tags.posts.update', $tag->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="posts">Select Posts:</label>
                                <select id="posts" name="posts[]" class="form-control" multiple style="height: 200px;">
                                    @foreach($allPosts as $post)
                                        <option value="{{ $post->id }}" {{ $tag->posts->contains($post->id) ? 'selected' : '' }}>
                                            {{ $post->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
