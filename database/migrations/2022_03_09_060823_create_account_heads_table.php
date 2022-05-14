<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('account_heads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parent_id')->nullable();

            $table->foreign('parent_id')->on('account_heads')->references('id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('account_heads');
    }
};
