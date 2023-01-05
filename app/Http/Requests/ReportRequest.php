<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "hoge"=>'required|string|max:255'
        ];
    } 
    public function attributes()
    {
        return [
            'hoge' => 'ホゲ',
        ];
    }
       /**
    * @Override
    * 勝手にリダイレクトさせない
    * @param  \Illuminate\Contracts\Validation\Validator  $validator
    */
    protected function failedValidation(Validator $validator)
   {
   }

   /**
    * バリデータを取得する
    * @return  \Illuminate\Contracts\Validation\Validator  $validator
    */
   public function getValidator()
   {
    
    Log::info($this->getValidatorInstance());
       return $this->validator;
   }
}
