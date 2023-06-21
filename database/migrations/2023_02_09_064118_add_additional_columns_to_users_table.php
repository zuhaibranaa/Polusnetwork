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
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false);
            $table->float('PLS', 10, 2, true)->default(0);
            $table->float('USDT', 10, 2, true)->default(0);
            $table->integer('BRAIN')->default(0);
            $table->float('LOCKED_PLS', 10, 2, true)->default(0);
            $table->float('LOCKED_USDT', 10, 2, true)->default(0);
            $table->integer('LOCKED_BRAIN')->default(0);
            $table->string('refferal_code')->nullable();
            $table->string('withdrawal_address')->nullable();
            $table->string('refference_code')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
