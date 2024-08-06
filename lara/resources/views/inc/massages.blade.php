{{-- если есть ошибка (проверяется через ContactsRequest) --}}
@if($errors->any()) 
    <div class="alert alert-danger">
        <ul>
            {{-- запускается цикл вывода ошибок --}}
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


{{-- запуск сообщения успеха --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif