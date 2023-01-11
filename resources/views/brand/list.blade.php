@extends('layout')
@section('content')

    <h1>{{ $title }}</h1>

    @if (count($items) > 0)

        <table class="table table-striped table-hover table-sm">
            <thead class="thead-light">
                <tr>
                    <th>ID</td>
                    <th>Nosaukums</td>
                    <th>&nbsp;</td>
                </tr>
            </thead>
            <tbody>
            @foreach($items as $brand)
            <tr>
                <td>{{ $brand->id }}</td>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="/brands/update/{{ $brand->id }}" class="btn btn-outline-primary btn-sm">Labot</a>
                    <form action="/brands/delete/{{ $brand->id }}" method="post" class="deletion-form d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

        <a href="/brands/create" class="btn btn-primary">Izveidot jaunu</a>
    @else

        <p>Nav atrasts neviens ieraksts</p>
        <a href="/brands/create" class="btn btn-primary">Izveidot jaunu</a>

    @endif
@endsection