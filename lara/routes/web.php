<?php

use Illuminate\Support\Facades\Route;

// путь для страницы
Route::get('/', function () {
    return view('home');
})->name('home'); // указывается именно имя для ссылки, чтобы в данном файле можно было менять ссылку не меняя ее в других местах

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

// отслеживание url адреса для функции deleteMassage удаления сообщения
Route::get('/contacts/all/{id}/delete', 'App\Http\Controllers\ContactsController@deleteMassage')->name('contact-delete');

// обработчик url адреса для функции updateMassageSubmit отправка редактированного сообщ. через post в БД
Route::post('/contacts/all/{id}/update', 'App\Http\Controllers\ContactsController@updateMassageSubmit')->name('contact-update-submit');

// отслеживание url адреса для функции updateMassage редактирование сообщения
Route::get('/contacts/all/{id}/update', 'App\Http\Controllers\ContactsController@updateMassage')->name('contact-update');

// отслеживание url адреса для функции showOneMassage показ сообщений
Route::get('/contacts/all/{id}', 'App\Http\Controllers\ContactsController@showOneMassage')->name('contact-data-one');

// через метод post передаем к контроллер функцию allData + имя url обработчика contact-data
Route::get('/contacts/all', 'App\Http\Controllers\ContactsController@allData')->name('contact-data');

// методом post на страницу /contacts/submit отправляется функция submit из контроллера ContactsController из contact-form (в файле contacts)
Route::post('/contacts/submit', 'App\Http\Controllers\ContactsController@submit')->name('contact-form');