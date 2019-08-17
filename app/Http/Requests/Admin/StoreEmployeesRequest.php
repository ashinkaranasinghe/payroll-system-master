<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeesRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'birthday' => 'required|date_format:'.config('app.date_format'),
            'employee_no' => 'required|unique:employees,employee_no,'.$this->route('employee'),
            'epf_no' => 'required|unique:employees,epf_no,'.$this->route('employee'),
            'salary_group_id' => 'required',
        ];
    }
}
