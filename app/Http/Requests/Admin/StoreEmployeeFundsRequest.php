<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeFundsRequest extends FormRequest
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
            'fund_name' => 'required|unique:employee_funds,fund_name,'.$this->route('employee_fund'),
            'employee_percentage' => 'numeric|required',
            'employer_percentage' => 'numeric|required',
        ];
    }
}
