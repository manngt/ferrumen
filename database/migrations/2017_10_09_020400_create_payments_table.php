<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->integer('id')->unsigned();

            $table->primary('id');

            $table->integer('sale_id')->unsigned();

            $table->integer('paymentMethod_id')->unsigned();

            $table->decimal('paymentAmount',10,2);

            $table->timestamps();

            $table->foreign('sale_id')

                ->references('id')

                ->on('sales')

                ->onDelete('restrict')

                ->onUpdate('cascade');

            $table->foreign('paymentMethod_id')

                ->references('id')

                ->on('payment_methods')

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
        Schema::dropIfExists('payments');
    }
}
