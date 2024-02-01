@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Modifica Progetto</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="row">
            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf
                {{-- title description thumb price series sale_date type --}}
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title') ?? $project->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea name="description" value="{{ old('description') ?? $project->description }}"
                        class="form-control @error('description') is-invalid @enderror" id="description" cols="6" rows="5"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">image</label>
                    <input type="text" class="form-control" id="image" name="image"
                        value="{{ old('image') ?? $project->image }}">
                </div>
                <div class="mb-3">
                    <label for="topic" class="form-label">topic</label>
                    <input type="text" class="form-control" id="topic" name="topic"
                        value="{{ old('topic') ?? $project->topic }}">
                </div>

                <button type="submit" class="btn btn-primary">Conferma modifiche</button>
            </form>
            <a href="{{ route('admin.projects.index') }}" class="btn btn-warning">Torna alla sezione Progetti</a>
        </div>
    </div>
@endsection
