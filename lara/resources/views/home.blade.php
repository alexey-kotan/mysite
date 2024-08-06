@extends('blocks.app')


@section('title')Главная страница@endsection

@section('content')
<h1>Главная страница</h1>
@endsection

{{-- добавление пунктов в боковое меню (не добавляется на другеи страницы) --}}
{{-- заимствование секии aside в файле aside --}}
@section('aside')
{{-- заимствование --}}
    @parent
    {{-- добавлениа доп контента --}}
    <p>Пункт 1</p>
@endsection