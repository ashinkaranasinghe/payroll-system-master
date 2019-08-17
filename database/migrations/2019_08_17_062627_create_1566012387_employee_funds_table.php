<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1566012387EmployeeFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('employee_funds')) {
            Schema::create('employee_funds', function (Blueprint $table) {
                $table->increments('id');
                $table->string('fund_name')->nullable();
                $table->double('employee_percentage', 4, 2)->nullable();
                $table->double('employer_percentage', 4, 2)->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_funds');
    }
}
