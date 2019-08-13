<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('product_lib');
            $table->string('product_code')->nullable();
            $table->integer('number_products_needed')->nullable();
            $table->string('shop')->nullable();
            $table->float('discount')->nullable();
            $table->float('minimum_basket_price')->nullable();
            $table->date('expiration')->nullable();
            $table->string('code')->nullable();

            $table->boolean('used')->default(0);
            $table->boolean('notify_me')->default(0);

            $table->softDeletes();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
