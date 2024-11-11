<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('task');
        Schema::create('task',Function (Blueprint $table) 
        {
            $table->integer('task_id');
            $table->integer('assigned_to');
            $table->string('task_name', length:255);
            $table->text('description');
            $table->string('status', length:50);
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('project_project_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
