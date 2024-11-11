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
        Schema::dropIfExists('message');
        Schema::create('message', function (Blueprint $table) {
            $table->integer('message_id');
            $table->text('content');
            $table->dateTime('timestamp', precision: 0);
            $table->integer('project_project_id');
            $table->integer('member_member_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};
