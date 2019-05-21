<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ppmp_id');
            $table->unsignedInteger('costcenter_id');
            $table->unsignedInteger('fundsource_id');
            $table->unsignedInteger('account_id');
            $table->unsignedInteger('mop_id');
            $table->string('type', 128);
            $table->string('year', 6);
            $table->string('remark', 32)->default('Consolidated');
            $table->foreign('costcenter_id')->references('id')->on('cost_centers');
            $table->foreign('fundsource_id')->references('id')->on('fund_sources');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->foreign('mop_id')->references('id')->on('mops');
            $table->foreign('ppmp_id')->references('id')->on('ppmps');
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
        Schema::dropIfExists('apps');
    }
}
