<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1566010882SalaryGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_groups', function (Blueprint $table) {
            if(Schema::hasColumn('salary_groups', 'basic_salary')) {
                $table->dropColumn('basic_salary');
            }
            if(Schema::hasColumn('salary_groups', 'ot_rate')) {
                $table->dropColumn('ot_rate');
            }
            
        });
Schema::table('salary_groups', function (Blueprint $table) {
            
if (!Schema::hasColumn('salary_groups', 'ot_rate')) {
                $table->decimal('ot_rate', 15, 2)->nullable();
                }
if (!Schema::hasColumn('salary_groups', 'salary')) {
                $table->decimal('salary', 15, 2)->nullable();
                }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('salary_groups', function (Blueprint $table) {
            $table->dropColumn('ot_rate');
            $table->dropColumn('salary');
            
        });
Schema::table('salary_groups', function (Blueprint $table) {
                        $table->double('basic_salary', 4, 2)->nullable();
                $table->double('ot_rate', 4, 2)->nullable();
                
        });

    }
}
