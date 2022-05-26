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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('account_head_id');
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();

            $table->foreign('module_id')->on('modules')->references('id');
            $table->foreign('account_head_id')->on('account_heads')->references('id');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
};
