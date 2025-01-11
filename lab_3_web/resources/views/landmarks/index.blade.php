@extends('layouts.appp')

@section('content')
<div class="container">
    <h1>Достопримечательности</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('landmarks.create') }}" class="btn btn-primary mb-3">Добавить достопримечательность</a>

    @if ($landmarks->isEmpty())
        <p>Нет доступных достопримечательностей.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Город</th>
                    <th>Описание</th>
                    <th>Добавил</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($landmarks as $landmark)
                    <tr>
                        <td>{{ $landmark->name }}</td>
                        <td>{{ $landmark->city->name }}</td>
                        <td>{{ $landmark->description }}</td>
                        <td>{{ $landmark->user->name }}</td>
                        <td>
                            <a href="{{ route('landmarks.edit', $landmark->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                            <form action="{{ route('landmarks.destroy', $landmark->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
