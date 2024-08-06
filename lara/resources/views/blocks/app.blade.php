{{-- основной шаблон html для всех страниц --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    {{-- в основной шаблон вставлен шаблон header (шапка сайта) --}}
    @include('inc.header')
    <div class="container mt-5">
        {{-- вызов собщения успеха --}}
        @include('inc.massages') 
        <div class="row">
            <div class="col-8">
                {{-- сюда вставляется основной контент страницы, в которой используется данный шаблон html --}}
                @yield('content')
            </div>
            <div class="col-4">
                {{-- в основной шаблон html вставлена боковая панель aside --}}
                @include('inc.aside')
            </div>
        </div>
    </div>

    @include('inc.footer')
</body>
</html>