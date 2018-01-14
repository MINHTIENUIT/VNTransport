<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhaXeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nha_xe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->length(10)->unsigned();
            $table->string('ten_nha_xe', 64);
            $table->string('ten_chu_xe', 64);
            $table->string('email');
            $table->string('dien_thoai', 16);
            $table->string('thong_tin', 1024);
            $table->string('dia_chi', 125); 
            $table->string('link_anh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nha_xe');
    }
}
