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
        Schema::create('project_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('projects');
            $table->foreignId('cost_attribute_id')->constrained('cost_attributes');
            $table->string('description')->nullable();
            $table->string('justification')->nullable();
            $table->decimal('cost', 10, 2)->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('total_cost', 10, 2)->nullable();
            $table->decimal('actual_spending', 10, 2)->nullable();
            $table->decimal('balance', 10, 2)->nullable();
            $table->boolean('checked')->nullable();
            $table->string('receipt')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_costs');
    }
};
