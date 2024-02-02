@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Nuovo Progetto</h2>
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
            <form action="{{ route('admin.types.store') }}" method="POST">
                @csrf
                {{-- title description thumb price series sale_date type --}}
                <div class="mb-3">
                    <label for="name" class="form-label">name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                        cols="6" rows="5"></textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Inserisci</button>
            </form>
            <a href="{{ route('admin.types.index') }}" class="btn btn-warning">Torna alla sezione Types</a>
        </div>
    </div>
@endsection
