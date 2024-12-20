@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $city->name }}</h1>
    <div class="mb-3">
        <img src="{{ asset($city->image) }}" alt="{{ $city->name }}" class="img-fluid w-50">
    </div>
    <p><strong>Год основания:</strong> {{ $city->foundation_year }}</p>
    <p><strong>Мэр:</strong> {{ $city->mayor }}</p>
    <p><strong>Описание:</strong> {{ $city->description }}</p>
    <a href="{{ route('cities.index') }}" class="btn btn-primary">Назад</a>
</div>
@endsection
