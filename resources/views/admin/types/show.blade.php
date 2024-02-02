@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h2>{{ $type->name }}</h2>
        </div>
        <div class="row">
            <p>{{ $type->description }}</p>
            {{-- <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Modifica</a> --}}
            <a href="{{ route('admin.types.index') }}" class="btn btn-primary mt-3">Torna alla type list</a>

        </div>
    </div>
@endsection
