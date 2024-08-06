<?php // контроллер для проверки валидации и вывод ошибок
    
    namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
{
    // только авторизованные пользователи могут заполнять форму (false-да, true-нет)
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array // тут прописываются правила для строк формы contact-form
    {
        return [
        //  "имя формы"=> "правило|правило|правило",
            "name"=> "required",
            "email"=> "required|email",
            'subject' => 'required|min:3|max:70',
            'massage' => 'required|min:5|max:350',
        ];
    }

    public function messages() { // вывод сообщения ошибок, если правила не соблюдены
        return [
        //  'имя.правило'=> 'вывод сообщения',
            'name.required'=> 'Поле имя является обязательным',
            'email.required'=> 'Email введен неправильно',
            'subject.required'=> 'Тема сообщения должна содержать от 3 до 70 символов',
            'massage.required'=> 'Сообщение должно содержать от 5 до 350 символов',
        ];
    }
}
