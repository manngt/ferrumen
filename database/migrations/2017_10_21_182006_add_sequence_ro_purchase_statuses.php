<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSequenceRoPurchaseStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchase_statuses', function (Blueprint $table) {

            $table->integer('purchaseStatusSequence');

            $table->unique('purchaseStatusSequence');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchase_statuses', function (Blueprint $table) {

            $table->dropColumn('purchaseStatusSequence');

        });

    }
}
