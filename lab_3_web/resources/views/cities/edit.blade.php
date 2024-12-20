@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать город</h1>
    <form action="{{ route('cities.update', $city->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Название города</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $city->name }}" required>
        </div>

        <div class="mb-3">
            <label for="foundation_year" class="form-label">Год основания</label>
            <input type="number" class="form-control" id="foundation_year" name="foundation_year" value="{{ $city->foundation_year }}" required>
        </div>

        <div class="mb-3">
            <label for="mayor" class="form-label">Мэр</label>
            <input type="text" class="form-control" id="mayor" name="mayor" value="{{ $city->mayor }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Изображение</label>

            @if ($city->image)
                <div class="mb-3">
                    <p>Текущее изображение:</p>
                    <img src="{{ asset($city->image) }}" class="img-fluid w-50" id="currentImage" alt="Текущее изображение">
                </div>
            @endif

            <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            
            <div class="mt-3" id="imagePreviewContainer" style="display: none;">
                <p>Новое изображение:</p>
                <img id="newImagePreview" alt="Предварительный просмотр" style="max-width: 200px; max-height: 200px;">
            </div>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Краткое описание</label>
            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $city->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Обновить</button>
    </form>
</div>

<script>
    function previewImage(event) {
        const imageInput = event.target;
        const previewContainer = document.getElementById('imagePreviewContainer');
        const previewImage = document.getElementById('newImagePreview');

        // Если выбран файл, показываем его в предварительном просмотре
        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.style.display = 'block';
            };

            reader.readAsDataURL(imageInput.files[0]);
        } else {
            previewContainer.style.display = 'none';
        }
    }
</script>
@endsection
