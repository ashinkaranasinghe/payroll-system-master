<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmployeeFund
 *
 * @package App
 * @property string $fund_name
 * @property double $employee_percentage
 * @property double $employer_percentage
*/
class EmployeeFund extends Model
{
    use SoftDeletes;

    protected $fillable = ['fund_name', 'employee_percentage', 'employer_percentage'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEmployeePercentageAttribute($input)
    {
        if ($input != '') {
            $this->attributes['employee_percentage'] = $input;
        } else {
            $this->attributes['employee_percentage'] = null;
        }
    }

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setEmployerPercentageAttribute($input)
    {
        if ($input != '') {
            $this->attributes['employer_percentage'] = $input;
        } else {
            $this->attributes['employer_percentage'] = null;
        }
    }
    
}
