<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBmrResult extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        
        return $rules= [
            'age' => 'required|numeric',
            'weight' => 'required|numeric',
            'goal_weight' => 'required|numeric',
            'height' => 'required|numeric',
            'gender' => 'required',
            'activityLevel' => 'required',
            'exerciseLevel' => 'required',
        ];
    }

}
