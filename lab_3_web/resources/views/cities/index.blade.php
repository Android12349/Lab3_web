@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Добавить город</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Год основания</th>
                <th>Мэр</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->foundation_year }}</td>
                <td>{{ $city->mayor }}</td>
                <td>
                    <a href="{{ route('cities.show', $city->id) }}" class="btn btn-info btn-sm">Просмотр</a>
                    <a href="{{ route('cities.edit', $city->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                    <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
