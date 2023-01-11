@extends('layout')
@section('content')

<h1>{{ $title }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">Lūdzu, novērsiet radušās kļūdas!</div>
@endif
<form
    method="post"
    action="{{ $car->exists ? '/cars/patch/' . $car->id : '/cars/put' }}"
    enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="car-name" class="form-label">Nosaukums</label>

        <input
            type="text"
            id="car-name"
            name="name"
            value="{{ old('name', $car->name) }}"
            class="form-control @error('name') is-invalid @enderror"
        >
        @error('name')
            <p class="invalid-feedback">{{ $errors->first('name') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="car-brand" class="form-label">Brands</label>
        <select
            id="car-brand"
            name="brand_id"
            class="form-select @error('brand_id') is-invalid @enderror"
        >
            <option value="">Norādiet brandu!</option>
                @foreach($brands as $brand)
                    <option
                        value="{{ $brand->id }}"
                        @if ($brand->id == old('brand_id', $car->brand->id ?? false)) selected @endif >{{ $brand->name }}
                    </option>
                @endforeach
        </select>
        @error('brand_id')
            <p class="invalid-feedback">{{ $errors->first('brand_id') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="car-type" class="form-label">Tips</label>
        <select
            id="car-type"
            name="type_id"
            class="form-select @error('type_id') is-invalid @enderror"
        >
            <option value="">Norādiet tipu!</option>
                @foreach($types as $type)
                    <option
                        value="{{ $type->id }}"
                        @if ($type->id == old('type_id', $car->type->id ?? false)) selected @endif >{{ $type->name }}
                    </option>
                @endforeach
        </select>
        @error('type_id')
            <p class="invalid-feedback">{{ $errors->first('type_id') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="car-description" class="form-label">Apraksts</label>
        <textarea
            id="car-description"
            name="description"
            class="form-control @error('description') is-invalid @enderror"
        >{{ old('description', $car->description) }}</textarea>

        @error('description')
        <p class="invalid-feedback">{{ $errors->first('description') }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="car-year" class="form-label">Izdošanas gads</label>

        <input
            type="number" max="{{ date('Y') + 1 }}" step="1"
            id="car-year"
            name="year"
            value="{{ old('year', $car->year) }}"
            class="form-control @error('year') is-invalid @enderror"
        >

        @error('year')
            <p class="invalid-feedback">{{ $errors->first('year') }}</p>
        @enderror
    </div>
    <div class="mb-3">
        <label for="car-price" class="form-label">Cena</label>
        <input
            type="number" min="0.00" step="0.01" lang="en"
            id="car-price"
            name="price"
            value="{{ old('price', $car->price) }}"
            class="form-control @error('price') is-invalid @enderror"
        >

        @error('price')
            <p class="invalid-feedback">{{ $errors->first('price') }}</p>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="car-image" class="form-label">Attēls</label>

        @if ($car->image)
            <img
                src="{{ asset('images/' . $car->image) }}"
                class="img-fluid img-thumbnail d-block mb-2"
                alt="{{ $car->name }}"
            >
        @endif

        <input
            type="file" accept="image/png, image/jpeg"
            id="car-image"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
        >

        @error('image')
            <p class="invalid-feedback">{{ $errors->first('image') }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <div class="form-check">
            <input
                type="checkbox"
                id="car-display"
                name="display"
                value="1"
                class="form-check-input @error('display') is-invalid @enderror"
                @if (old('display', $car->display)) checked @endif
            >
            <label class="form-check-label" for="car-display">
                Publicēt ierakstu
            </label>
            @error('display')
                <p class="invalid-feedback">{{ $errors->first('display') }}</p>
            @enderror
        </div>
    </div>   

    <button type="submit" class="btn btn-primary">
        {{ $car->exists ? 'Atjaunot ierakstu' : 'Pievienot ierakstu' }}
    </button>
</form>

@endsection