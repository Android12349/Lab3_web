<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Laravel App</title>
        @vite(['resources/js/index.js', 'resources/sass/styles.scss'])
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <img src="{{ asset('laravel/portugal.png') }}" class="me-2" alt="...">
                <a class="navbar-brand" href="{{ url('/cities') }}">Города Португалии</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <a class="nav-link ms-auto me-1" href="#" id="liveToastBtn">Загрузить</a>
                </div>
            </div>
        </nav> 

        <div class="toast-container position-fixed top-0 end-0 p-3">
            <div id="loadingToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <i class="fa fa-spinner fa-spin me-1" style="font-size:17px"></i>
                    <strong class="me-auto">Ошибка!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Кнопка загрузить в отпуске😞
                </div>
            </div>
        </div>

        <div class="container text-center">
            <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 d-flex align-items-stretch gy-3 my-3">
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('laravel/lissabon.jpg') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Лиссабон</h5>
                            <p class="card-text"><b>Год основания: 1179 г.</b> </br><b>Мэр:</b> Карлуш Муэдаш</p>
                            <p class="modal-text" hidden>Столица Португалии</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary" onclick="openModal(this)">Просмотреть детали</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('laravel/vila.jpg') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Вила-Нова-ди-Гая</h5>
                            <p class="card-text"><b>Год основания: 1255 г.</b> </br><b>Мэр:</b> Луиш Фелипи Менезиш</p>
                            <p class="modal-text" hidden>Именно здесь, а не в Порту, как иногда ошибочно считают, находятся знаменитые винные погреба с португальским портвейном.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary" onclick="openModal(this)">Просмотреть детали</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('laravel/evora.jpg') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Эвора</h5>
                            <p class="card-text"><b>Год основания: 1166 г.</b> </br><b>Мэр:</b> Эрнесту Оливейра </p>
                            <p class="modal-text" hidden>Эвора является городом-музеем и внесена в список Всемирного наследия ЮНЕСКО.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary" onclick="openModal(this)">Просмотреть детали</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('laravel/portu.jpg') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Порту</h5>
                            <p class="card-text"><b>Год основания: 1123 г.</b> </br><b>Мэр:</b> Руй Морейра</p>
                            <p class="modal-text" hidden>ФК «Порту» один из трёх сильнейших футбольных клубов в Португалии. Двукратный победитель (1986/1987 и 2003/2004) Лиги чемпионов УЕФА.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary" onclick="openModal(this)">Просмотреть детали</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ asset('laravel/lagush.jpg') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Лагуш</h5>
                            <p class="card-text"><b>Год основания: 1255 г.</b> </br><b>Мэр:</b> Жулиу Баррозу</p>
                            <p class="modal-text" hidden>37°06′ с. ш. 8°40′ з. д.</p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary" onclick="openModal(this)">Просмотреть детали</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <!-- Модальное окно -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel">Заголовок картинки</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="" id="modalImage" class="img-fluid">
                        <em><p id="imageDescription">Описание картинки</p></em>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <div class="centralizer">
                <div class="name">
                    Редикульцев Андрей
                </div>
                <div class="icons">
                    <a href="https://m.vk.com/"><img src="{{ asset('laravel/vk.jpg') }}" alt="Vk" class="icon"></a>
                    <a href="https://web.telegram.org/"><img src="{{ asset('laravel/tg.jpg') }}" alt="Tg" class="icon"></a>
                    <a href="https://github.com/"><img src="{{ asset('laravel/github.jpg') }}" alt="GitHub" class="icon"></a>
                </div>
            </div>
        </footer>
    
        <script src="{{ asset('dist/bundle.js') }}"></script>
    </body>
</html>
