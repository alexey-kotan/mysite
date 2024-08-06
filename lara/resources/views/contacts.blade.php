{{-- тут хранится шаблон соновного html файла --}}
@extends('blocks.app')
{{-- секция для указания названия страницы --}}
@section('title')Контакты@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
<h1>Контакты</h1>

{{-- форма для заполнения, отправляющая методом пост нас таницу с именем contact-form (указан в web.php) --}}
<form action="{{ route('contact-form') }}" method="post">
    {{-- токен нужно прописывать во всех формах Laravel, для защиты форм от ботов (без него будет ошибка) --}}
    @csrf

    <div class="form-group">
        <label for="name">Введите имя</label>
        <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Введите email</label>
        <input type="email" name="email" placeholder="Введите email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="subject">Тема сообщения</label>
        <input type="text" name="subject" placeholder="Тема Сообщения" id="subject" class="form-control">
    </div>

    <div class="form-group">
        <label for="massage">Сообщение</label>
        <textarea name="massage" id="massage" class="form-control" placeholder="Введите сообщение"></textarea>
    </div>
    {{-- тип submit перезагружает страницу --}}
    <button type="submit" class="btn btn-success">Отправить</button>
</form>
@endsection