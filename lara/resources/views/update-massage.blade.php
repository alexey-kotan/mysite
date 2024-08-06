{{-- тут хранится шаблон соновного html файла --}}
@extends('blocks.app')
{{-- секция для указания названия страницы --}}
@section('title')Редактирование записи@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
<h1>Редактирование записи</h1>

{{-- форма для заполнения, отправляющая методом пост нас таницу с именем contact-update-submit (указан в web.php) --}}
{{-- + вторым параметром передаем занчение id, так как в ссылке есть динамическое значение --}}
<form action="{{ route('contact-update-submit', $data->id) }}" method="post">
    {{-- токен нужно прописывать во всех формах Laravel, для защиты форм от ботов (без него будет ошибка) --}}
    @csrf

    <div class="form-group">
        <label for="name">Введите имя</label>
        <input type="text" name="name" value="{{$data->name}}" placeholder="Введите имя" id="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="email">Введите email</label>
        <input type="email" name="email" value="{{$data->email}}" placeholder="Введите email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="subject">Тема сообщения</label>
        <input type="text" name="subject" value="{{$data->subject}}" placeholder="Тема Сообщения" id="subject" class="form-control">
    </div>

    <div class="form-group">
        <label for="massage">Сообщение</label>
        <textarea name="massage" id="massage" class="form-control" placeholder="Введите сообщение">{{$data->massage}}</textarea>
    </div>
    {{-- тип submit перезагружает страницу --}}
    <button type="submit" class="btn btn-success">Отредактировать</button>
</form>
@endsection