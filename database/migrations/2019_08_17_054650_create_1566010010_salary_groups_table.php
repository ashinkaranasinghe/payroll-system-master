<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1566010010SalaryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('salary_groups')) {
            Schema::create('salary_groups', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->integer('maximum_leave_days')->nullable()->unsigned();
                $table->double('basic_salary', 4, 2)->nullable();
                $table->double('ot_rate', 4, 2)->nullable();
                
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
        Schema::dropIfExists('salary_groups');
    }
}
