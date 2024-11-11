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
        Schema::dropIfExists('member');
        Schema::create('member', function (Blueprint $table) {
            $table->integer('member_id');
            $table->string('member_firstname',length:255);
            $table->string('member_lastname', length:255);
            $table->string('email', length:255);
            $table->string('password', length:255);
            $table->string('phone', length:100);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
