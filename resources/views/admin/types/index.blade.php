@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">

            @foreach ($types as $type)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Id: {{ $type->id }}</div>
                        <div class="card-body">{{ $type->name }}</div>
                        <div class="card-body">{{ $type->description }}</div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.types.show', $type->id) }}" class="btn btn-primary mx-2 mb-2">Show
                                details</a>
                            <a href="{{ route('admin.types.edit', $type->id) }}" class="btn btn-info mx-2 mb-2">Edit</a>
                            <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST"
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
