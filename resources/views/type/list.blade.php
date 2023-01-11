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
            @foreach($items as $type)
            <tr>
                <td>{{ $type->id }}</td>
                <td>{{ $type->name }}</td>
                <td>
                    <a href="/types/update/{{ $type->id }}" class="btn btn-outline-primary btn-sm">Labot</a>
                    <form action="/types/delete/{{ $type->id }}" method="post" class="deletion-form d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Dzēst</button>
                    </form>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>

        <a href="/types/create" class="btn btn-primary">Izveidot jaunu</a>
    @else

        <p>Nav atrasts neviens ieraksts</p>
        <a href="/types/create" class="btn btn-primary">Izveidot jaunu</a>

    @endif
@endsection