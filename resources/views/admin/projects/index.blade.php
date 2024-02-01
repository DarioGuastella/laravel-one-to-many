@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            @foreach ($projects as $project)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ $project->title }}</div>
                        <h6 class="card-subtitle mb-2 text-muted">
                            {{ $project->type ? $project->type->name : 'senza categoria' }}
                        </h6>
                        <div class="card-body">{{ $project->description }}</div>
                        <a class="d-flex justify-content-center" href="{{ route('admin.projects.show', $project->id) }}"><img
                                src="{{ $project->image }}" class="comics-img w-25 align-self-center"
                                alt="{{ $project->title }}">
                        </a>
                        <div class="card-body">{{ $project->topic }}</div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.projects.show', $project->id) }}"
                                class="btn btn-primary mx-2 mb-2">Show
                                details</a>
                            <a href="{{ route('admin.projects.edit', $project->id) }}"
                                class="btn btn-info mx-2 mb-2">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                class="d-inline-block mx-2 mb-2">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </div>

                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
