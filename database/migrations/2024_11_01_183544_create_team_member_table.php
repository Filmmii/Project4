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
        Schema::create('team_member', function (Blueprint $table) {
            $table->id(); // สร้าง primary key ของตาราง

            // ความสัมพันธ์กับตาราง team
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id')->references('team_id')->on('team')->onDelete('cascade');
        
            // ความสัมพันธ์กับตาราง member
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('member_id')->on('member')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_member', function (Blueprint $table) {
            $table->dropForeign(['team_id']);
            $table->dropForeign(['member_id']);
        });

        Schema::dropIfExists('team_member');
    }
};
