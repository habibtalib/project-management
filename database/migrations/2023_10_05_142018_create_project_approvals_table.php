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
        Schema::create('project_approvals', function (Blueprint $table) {
            $table->id();
            $table->integer('approver_level')->nullable();
            $table->foreignId('project_id')->constrained('projects')->nullable();
            $table->foreignId('requester_id')->constrained('users')->nullable();
            $table->foreignId('approval_status_id')->constrained('approval_statuses')->nullable();
            $table->string('requester_remarks')->nullable();
            $table->string('approver_remarks')->nullable();
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
        Schema::dropIfExists('project_approvals');
    }
};
