@extends('layouts.dashboard_app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea id="postContent" class="form-control" name="content" rows="6">{{ $post->content }}</textarea>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-6">
                                    <!-- Dropzone -->
                                    <div id="dropzoneArea" class="dropzone">
                                        <div class="dz-message" data-dz-message>
                                            <span>Drop files here or click to upload</span>
                                        </div>
                                        <input id="photo" name="photo" value="{{$post->photo}}" style="display: none;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- Yüklenen Resim Önizlemesi -->
                                    <div  id="imagePreview">
                                        <img style="max-width: 100%;" id="uploadedImage" src="{{ asset('uploads/' . $post->photo) }}" alt="Uploaded Image">
                                    </div>

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
