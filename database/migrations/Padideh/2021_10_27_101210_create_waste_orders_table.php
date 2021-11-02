<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWasteOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waste_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pasmand_id');
            $table->string('name')->nullable();
            $table->string('vahed')->nullable();
            $table->string('weight')->nullable();
            $table->string('price')->nullable();
            $table->unsignedBigInteger('waste_orderhead_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('pasmand_id')->references('id')->on('pasmands');
            $table->foreign('waste_orderhead_id')->references('id')->on('waste_orderheads');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('waste_orders');
    }
}
