<!-- resources/views/tags/create.blade.php -->
@extends('layouts.dashboard_app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Tag</h4>
                    </div>
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
                        <!-- Form oluşturma -->
                        <form action="{{ route('tags.store') }}" method="POST">
                            @csrf

                            <!-- Tag adı alanı -->
                            <div class="mb-3">
                                <label for="name" class="form-label">Tag Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <!-- Submit düğmesi -->
                            <button type="submit" class="btn btn-primary">Create Tag</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
