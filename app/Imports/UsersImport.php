<?php

namespace App\Imports;

use App\EmployeeAttendance;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new EmployeeAttendance([
            
        ]);

        return new EmployeeAttendance([
            'user_id'     => $row[0],
            'month'    => $row[1], 
            'attendance' => $row[2],
         ]);
    }
}
