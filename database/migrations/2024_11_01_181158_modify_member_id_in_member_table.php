<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyMemberIdInMemberTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->bigIncrements('member_id')->change(); // Changes member_id to auto-incrementing
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
            $table->bigInteger('member_id')->change(); // Reverts to a non-auto-incrementing big integer
        });
    }
}