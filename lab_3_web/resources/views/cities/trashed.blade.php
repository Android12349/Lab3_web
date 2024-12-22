@extends('layouts.appp')

@section('content')
<div class="container">
    <h1>Удаленные города</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($trashedCities->isEmpty())
        <p>Нет удаленных городов.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trashedCities as $city)
                    <tr>
                        <td>{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td>
                        @can('restore', $city)
                            <form action="{{ route('cities.restore', $city->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Восстановить</button>
                            </form>
                        @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('users.cities.index', ['user' => $user->id]) }}" class="btn btn-primary">Назад к городам</a>
</div>
@endsection
