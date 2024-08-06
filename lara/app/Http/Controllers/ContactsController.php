<?php // контроллер для страницы contacts
    
    namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactsRequest; // путь, откуда будут браться ошибки для формы contact-form
use App\Models\contacts; // подключение файла модели contacts 

class ContactsController extends Controller {
    public function submit(ContactsRequest $req) { // вызывается функция  ContactsRequest в которой проверяется валидация
        
        $contact = new contacts(); // переменна выполняет функцию new (создать новую запись) из модели contacts
        $contact->name = $req->input('name'); // отсылаемся на строки в БД
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->massage = $req->input('massage');
        

        $contact->save(); // сохраняем данные

        return redirect()->route('contacts')->with('success', 'Сообщение успешно отправленно!'); // в конце переадресация на главную 
        //страницу + вызов сессии success успешного сообщения и само сообщение
    }

    public function allData() {
        return view('massages', ['data' => contacts::all()]);
// в шаблоне massages мы имеем доступ к параметру data, который содержит все записи из БД
// переменна выполняет функцию из модели contacts. обращаемся к функции all которая заложена в классе Model в файле contacts.php
    }

    public function showOneMassage($id) {
        return view('one-massages', ['data' => contacts::find($id)]);
// в шаблоне one-massages мы имеем доступ к параметру data, который содержит все записи из БД
// переменна выполняет функцию из модели contacts. обращаемся к функции поиска по id которая заложена в классе Model в файле contacts.php
    }

    public function updateMassage($id) {
        return view('update-massage', ['data' => contacts::find($id)]);
    }

    //первым параметром передается id + вызывается функция ContactsRequest в которой проверяется валидация
    public function updateMassageSubmit($id, ContactsRequest $req) { 
        
        $contact = contacts::find($id); // переменна выполняет функцию поиска по id из модели contacts для обновления данных
        $contact->name = $req->input('name'); // отсылаемся на строки в БД
        $contact->email = $req->input('email');
        $contact->subject = $req->input('subject');
        $contact->massage = $req->input('massage');
        

        $contact->save(); // сохраняем данные

        return redirect()->route('contact-data-one', $id)->with('success', 'Сообщение успешно обнновленно!'); // в конце переадресация на главную 
        //страницу + вызов сессии success успешного сообщения и само сообщение
    }
    //вызов функции для удаления сообщения с параметром id
    public function deleteMassage($id) {
        contacts::find($id)->delete(); // поиск записи по id + функция удаления из БД
        return redirect()->route('contact-data', $id)->with('success', 'Сообщение успешно удалено!'); // переадресация на все сообщения
    }
}
