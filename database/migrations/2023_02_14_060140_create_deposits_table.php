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
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('amount');
            $table->string('txn_id')->nullable();
            $table->string('deposit_address')->nullable();
            $table->string('checkout_url')->nullable();
            $table->string('status_url')->nullable();
            $table->string('qrcode_url')->nullable();
            $table->unsignedBigInteger('timeout')->nullable();
            $table->integer('status')->unsigned()->default(0); // 0 pending 1 paid 2 expired
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deposits');
    }
};
