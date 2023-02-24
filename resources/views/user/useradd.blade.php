@extends('layouts.main')
@section('content')
<form class="was-validated" method="POST" action="/userpost" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="position" class="form-label">Position</label>
        <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position')}}" required>
        @error('position')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="photo" class="form-label @error('photo') is-invalid @enderror">Photo</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="photo" name="photo" onchange="previewImage()">
        @error('photo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>
@endsection