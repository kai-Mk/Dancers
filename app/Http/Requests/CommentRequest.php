<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //コメント投稿のバリデーション
            'comment.name' => 'required | string | max:20',
            'comment.comment' => 'required | string | max:200',
        ];
    }
    
    public function messages(){
        return [
            'comment.name.required' => '名前は必ず入力して下さい。',
            'comment.comment.required' => 'コメントは必ず入力して下さい。',
            'comment.name.max' => '名前は20字以内にして下さい',
            'comment.comment.max' => 'コメントは200字以内にして下さい',
            ];
    }
}
