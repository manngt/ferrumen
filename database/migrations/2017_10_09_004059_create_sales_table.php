<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->string('customer_id');

            $table->integer('saleStatus_id')->unsigned();

            $table->string('invoiceSerial');

            $table->bigInteger('invoiceNumber');

            $table->date('issueDate');

            $table->unique(['customer_id','invoiceSerial','invoiceNumber'],'unique_customer_sale_index');

            $table->timestamps();

            $table->foreign('customer_id')

                ->references('id')

                ->on('customers')

                ->onDelete('restrict')

                ->onUpdate('cascade');


            $table->foreign('saleStatus_id')

                ->references('id')

                ->on('sale_statuses')

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
        Schema::dropIfExists('sales');
    }
}
