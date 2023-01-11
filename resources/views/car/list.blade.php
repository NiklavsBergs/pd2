@extends('layout')
@section('content')

<h1>{{ $title }}</h1>

@if (count($items) > 0)

    <table class="table table-sm table-hover table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Nosaukums</th>
                <th>Brands</th>
                <th>Tips</th>
                <th>Gads</th>
                <th>Cena</th>
                <th>Attēlot</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($items as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->brand->name }}</td>
                <td>{{ $car->type->name }}</td>
                <td>{{ $car->year }}</td>
                <td>&euro; {{ number_format($car->price, 2, '.') }}</td>
                <td>{!! $car->display ? '&#10004;&#65039;' : '&#10060;' !!}</td>
                <td>
                    <a href="/cars/update/{{ $car->id }}" class="btn btn-outline-primary btn-sm"
                    >Labot</a> /
                    <form
                        method="post"
                        action="/cars/delete/{{ $car->id }}"
                        class="d-inline deletion-form"
                    >
                        @csrf
                        <button
                        type="submit"
                        class="btn btn-outline-danger btn-sm"
                        >Dzēst</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>Nav atrasts neviens ieraksts</p>
@endif

<a href="/cars/create" class="btn btn-primary">Pievienot jaunu</a>

@endsection