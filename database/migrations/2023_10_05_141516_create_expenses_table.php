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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_cost_id')->constrained('project_costs')->nullable();
            $table->foreignId('project_id')->constrained('projects')->nullable();
            $table->foreignId('owner_id')->constrained('users')->nullable();
            $table->foreignId('vendor_id')->constrained('vendors')->nullable();
            $table->foreignId('payment_type_id')->constrained('payment_types')->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
