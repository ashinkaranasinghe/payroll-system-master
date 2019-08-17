<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreSalaryGroupsRequest extends FormRequest
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
            'name' => 'required|unique:salary_groups,name,'.$this->route('salary_group'),
            'maximum_leave_days' => 'max:2147483647|required|numeric',
            'ot_rate' => 'required',
            'salary' => 'required',
        ];
    }
}
