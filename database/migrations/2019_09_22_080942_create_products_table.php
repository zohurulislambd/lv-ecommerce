<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('quantity');
            $table->integer('price');
//            $table->string('description');
           /* $table->string('slug');
            $table->integer('offer_price')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('brand_id')->unsinged();
            $table->integer('category_id')->unsinged();
            $table->integer('admin_id')->unsinged();*/
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
        Schema::dropIfExists('products');
    }
}
