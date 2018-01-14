<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xe', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('nha_xe_id')->length(10)->unsigned();
            $table->integer('so_tuyen_di')->length(100)->unsigned();
            $table->double('gia', 9, 3);
            $table->string('dich_vu', 256);
            $table->integer('noi_di_id')->length(10)->unsigned();
            $table->integer('noi_den_id')->length(10)->unsigned();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xe');
    }
}
