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
        Schema::create('poultries', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->integer('remaining_quantity')->default(0);
            $table->unsignedBigInteger('poultry_type_id');
            $table->unsignedBigInteger('poultry_status_id');
            $table->unsignedBigInteger('account_head_id')->nullable();
            $table->integer('status');
            $table->date('created_at');
            $table->date('collection_date')->nullable();

            $table->foreign('poultry_type_id')->references('id')->on('poultry_types');
            $table->foreign('poultry_status_id')->references('id')->on('poultry_statuses');
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
        Schema::dropIfExists('poultries');
    }
};
