<?php
namespace App\Http\Requests;

class AwardRequest extends Request
{

	/**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules()
    {
        return [
        	'award' => 'required',
        ];
    }
}