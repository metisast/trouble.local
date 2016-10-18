<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TaskPublishRequest extends Request
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
            /*'user_name' => 'required',
            'email' => 'required|email',*/
            'room_id' => 'required',
            /*'description' => 'required|max:1000',
            'task_type_id' => 'required'*/
        ];
    }
}
