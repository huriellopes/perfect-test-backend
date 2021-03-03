<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->increments('id_sales');
            $table->unsignedInteger('product_id');
            $table->foreign('product_id')->references('id_product')->on('products');
            $table->unsignedInteger('client_id');
            $table->foreign('client_id')->references('id_client')->on('clients');
            $table->timestamp('saled_at');
            $table->integer('quantity');
            $table->float('discount', 10, 2);
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id_sales_status')->on('sales_status');
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
        Schema::dropIfExists('sales');
    }
}
