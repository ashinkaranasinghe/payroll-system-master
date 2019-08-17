<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SalaryGroup
 *
 * @package App
 * @property string $name
 * @property integer $maximum_leave_days
 * @property decimal $ot_rate
 * @property decimal $salary
*/
class SalaryGroup extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'maximum_leave_days', 'ot_rate', 'salary'];
    protected $hidden = [];
    
    

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setMaximumLeaveDaysAttribute($input)
    {
        $this->attributes['maximum_leave_days'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setOtRateAttribute($input)
    {
        $this->attributes['ot_rate'] = $input ? $input : null;
    }

    /**
     * Set attribute to money format
     * @param $input
     */
    public function setSalaryAttribute($input)
    {
        $this->attributes['salary'] = $input ? $input : null;
    }
    
}
