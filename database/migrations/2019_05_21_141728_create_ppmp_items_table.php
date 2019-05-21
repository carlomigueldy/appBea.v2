<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePpmpItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppmp_items', function (Blueprint $table) {
            $table->integer('item_id');
            $table->integer('ppmp_id');
            $table->string('quarter');
            $table->integer('quantity');
            $table->double('unit_price', 8, 2);
            $table->double('amount', 8, 2);
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
        Schema::dropIfExists('ppmp_items');
    }
}
