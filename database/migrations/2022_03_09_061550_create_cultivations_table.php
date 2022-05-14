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
        Schema::create('cultivations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cultivation_type_id');
            $table->unsignedBigInteger('account_head_id')->nullable();
            $table->string('fertilizer');
            $table->integer('total_area_cultivated');
            $table->timestamps();

            $table->foreign('cultivation_type_id')->references('id')->on('cultivation_types');
            $table->foreign('account_head_id')->references('id')->on('account_heads');



        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultivations');
    }
};
