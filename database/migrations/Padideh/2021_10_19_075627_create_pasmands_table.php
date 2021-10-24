<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePasmandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasmands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->nullable()->default(NULL);
            $table->string('vahed')->nullable()->default(NULL);
            $table->string('buy_price')->nullable()->default(NULL);
            $table->integer('sale_price')->nullable()->default(NULL);
            $table->text('description')->nullable()->default(NULL);
            $table->boolean('is_active')->nullable()->default(true);
            $table->softDeletes();
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
        Schema::dropIfExists('pasmands');
    }
}
