<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyXe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xe', function($table) {
            $table->foreign('nha_xe_id')->references('id')->on('nha_xe')->onDelete('cascade');
            $table->foreign('noi_di_id')->references('id')->on('dia_diem')->onDelete('cascade');
            $table->foreign('noi_den_id')->references('id')->on('dia_diem')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xe', function($table) {
            $table->dropForeign(['nha_xe_id']);
            $table->dropForeign(['tuyen_di_id']);
        });
    }
}
