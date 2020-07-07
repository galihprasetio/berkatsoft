<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeaderSOSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('header_so', function (Blueprint $table) {
            $table->id();
            $table->string('so_code');
            $table->integer('id_customer');
            $table->date('posting_date');
            $table->date('delivery_date');
            $table->string('status');
            $table->integer('tax');
            $table->integer('shipment');
            $table->integer('total_payment');
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
        Schema::dropIfExists('header_s_o_s');
    }
}
