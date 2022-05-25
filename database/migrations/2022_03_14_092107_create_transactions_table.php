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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('transaction_type_id');
            $table->unsignedBigInteger('account_head_id');
            $table->unsignedBigInteger('sub_head_id');
            $table->integer('quantity')->default(0);
            $table->string('description')->nullable();
            $table->integer('amount')->nullable();


            $table->foreign('transaction_type_id')->on('transaction_types')->references('id');
            $table->foreign('account_head_id')->on('account_heads')->references('id');
            $table->foreign('sub_head_id')->on('account_heads')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
