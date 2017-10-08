<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {

            $table->integer('purchase_id')->unsigned();

            $table->integer('product_id')->unsigned();

            $table->primary(['purchase_id','product_id']);

            $table->decimal('productQuantity',10,2);

            $table->timestamps();

            $table->foreign('purchase_id')
                ->references('id')->on('purchases')
                ->onDelete('restrict')
                ->onUpdate('cascade');

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('restrict')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_details');
    }
}
