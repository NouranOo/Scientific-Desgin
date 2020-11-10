<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone1');
            $table->string('phone2');
            $table->string('address');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->decimal('delivery_price', 5, 2)->default(0);
            $table->decimal('total_price', 5, 2)->default(0);
            $table->date('shipment_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->unsignedBigInteger('shiping_id')->nullable();
            $table->foreign('shiping_id')->references('id')->on('shipings')->onDelete('cascade');
            $table->string('note')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
