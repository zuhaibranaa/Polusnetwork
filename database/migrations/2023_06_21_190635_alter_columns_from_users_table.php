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
            $table->float('PLS', 255, 10)->default(0)->change();
            $table->float('USDT', 255, 10)->default(0)->change();
            $table->float('BRAIN',255,10)->default(0)->change();
            $table->float('LOCKED_PLS', 255, 10)->default(0)->change();
            $table->float('LOCKED_USDT', 255, 10)->default(0)->change();
            $table->float('LOCKED_BRAIN',255,10)->default(0)->change();
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
