<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->string('title');
            $table->string('summary')->nullable();
            $table->string('project_code')->nullable();
            $table->string('remarks')->nullable();
            $table->string('company_id')->nullable();
            $table->timestamp('project_date')->nullable();
            $table->string('purpose')->nullable();
            $table->string('photo')->nullable();
            $table->decimal('total_budget', 10, 2)->nullable();
            $table->decimal('total_spending', 10, 2)->nullable();
            $table->decimal('total_balance', 10, 2)->nullable();
            $table->integer('department_id')->nullable();
            $table->integer('requester_user_id')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->dropColumn('title');
            $table->dropColumn('summary');
            $table->dropColumn('project_code');
            $table->dropColumn('remarks');
            $table->dropColumn('company_id');
            $table->dropColumn('project_date');
            $table->dropColumn('purpose');
            $table->dropColumn('photo');
            $table->dropColumn('total_budget');
            $table->dropColumn('total_spending');
            $table->dropColumn('total_balance');
            $table->dropColumn('department_id');
            $table->dropColumn('requester_user_id');
            $table->dropColumn('month');
            $table->dropColumn('year');
        });
    }
};
