@extends('layouts.appp')

@section('content')
<div class="container">
    <h1>Города пользователя: {{ $user->name }}</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Год основания</th>
                <th>Мэр</th>
                <th>Информация</th>
                @if (auth()->id() === $user->id)
                    <th>Действия</th>
                @endif
            </tr>
        </thead>
        <tbody>
        @foreach ($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->foundation_year }}</td>
                <td>{{ $city->mayor }}</td>
                <td>{{ $city->description }}</td>
                @if (auth()->id() === $user->id) <!-- Действия только для владельца -->
                    <td>
                        <a href="{{ route('cities.edit', $city) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('cities.destroy', $city) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    @if (auth()->id() === $user->id)
        <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Добавить город</a>
    @endif
</div>
@endsection
