<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('sale_statuses', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->string('saleStatusName');

            $table->text('saleStatusDescription');

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
        Schema::dropIfExists('sale_statuses');
    }
}
