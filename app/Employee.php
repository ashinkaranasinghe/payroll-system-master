<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $birthday
 * @property string $contact__no
 * @property string $employee_no
 * @property string $epf_no
 * @property string $salary_group
*/
class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'birthday', 'contact__no', 'employee_no', 'epf_no', 'salary_group_id'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBirthdayAttribute($input)
    {
        if ($input != null && $input != '') {
            $this->attributes['birthday'] = Carbon::createFromFormat(config('app.date_format'), $input)->format('Y-m-d');
        } else {
            $this->attributes['birthday'] = null;
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthdayAttribute($input)
    {
        $zeroDate = str_replace(['Y', 'm', 'd'], ['0000', '00', '00'], config('app.date_format'));

        if ($input != $zeroDate && $input != null) {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('app.date_format'));
        } else {
            return '';
        }
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setSalaryGroupIdAttribute($input)
    {
        $this->attributes['salary_group_id'] = $input ? $input : null;
    }
    
    public function salary_group()
    {
        return $this->belongsTo(SalaryGroup::class, 'salary_group_id')->withTrashed();
    }
    
}
