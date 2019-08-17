<?php

use Illuminate\Database\Seeder;

class SalaryGroupSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 2, 'name' => 'Level 1', 'maximum_leave_days' => 5, 'ot_rate' => '5000.00', 'salary' => '30000.00',],
            ['id' => 3, 'name' => 'Level 2', 'maximum_leave_days' => 10, 'ot_rate' => '50.50', 'salary' => '35000.00',],

        ];

        foreach ($items as $item) {
            \App\SalaryGroup::create($item);
        }
    }
}
