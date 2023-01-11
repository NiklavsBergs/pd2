@extends('layout')

@section('content')

    <h1>{{ $title }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
    @endif

    <form method="post" action="{{ $brand->exists ? '/brands/patch/' . $brand->id : '/brands/put' }}">
        @csrf

        <div class="mb-3">
            <label for="brand-name" class="form-label">Branda nosaukums</label>

            <input
                type="text"
                class="form-control @error('name') is-invalid @enderror"
                id="brand-name"
                name="name"
                value="{{ old('name', $brand->name) }}">

            @error('name')
                <p class="invalid-feedback">{{ $errors->first('name') }}</p>
            @enderror

        </div>

        <button type="submit" class="btn btn-primary">Pievienot</button>
    </form>
@endsection