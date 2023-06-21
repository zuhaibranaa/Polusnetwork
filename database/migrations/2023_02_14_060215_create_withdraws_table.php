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
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->string('amount');
            $table->string('currency')->default('USDT.BEP20');
            $table->string('txn_id')->nullable();
            $table->string('withdrawal_address');
            $table->string('note')->nullable();
            $table->unsignedInteger('status')->default(0); // 0 pending 1 done 2 expired
            $table->unsignedBigInteger('timeout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('withdraws');
    }
};
