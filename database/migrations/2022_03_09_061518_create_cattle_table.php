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
        Schema::create('cattle', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->unsignedBigInteger('cattle_type_id');
            $table->unsignedBigInteger('account_head_id')->nullable();
            $table->integer('serial_no')->nullable();
            $table->date('dob')->nullable();
            $table->date('entry_in_farm')->nullable();
            $table->integer('age')->nullable();
            $table->string('breed', 45);
            $table->boolean('gender')->default('0');
            $table->integer('weight')->nullable();
            $table->integer('height')->nullable();
            $table->date('date')->nullable();
            $table->boolean('saleStatus')->default(0);
            $table->date('dry_date')->nullable();
            $table->date('dead_date')->nullable();


            $table->foreign('parent_id')->references('id')->on('cattle');
            $table->foreign('cattle_type_id')->references('id')->on('cattle_types');
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
        Schema::dropIfExists('cattle');
    }
};
