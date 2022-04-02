<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'post.title' => 'required | string | max:40',
            'post.main' => 'required | string | max:200',
            'post.video_quantity' => 'required',
            'video_A' => 'required',
            'video_B' => 'nullable',
            'video_C' => 'nullable',
            'video_D' => 'nullable',
            'video_E' => 'nullable',
        ];
        
    }
    
    public function messages(){
        return [
            'post.title.required' => 'タイトルは必ず入力して下さい。',
            'post.main.required' => '詳細文は必ず入力して下さい。',
            'video_A.required' => '動画は一つ以上選択してください',
            ];
    }
}
