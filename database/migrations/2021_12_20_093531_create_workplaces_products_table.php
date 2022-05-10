<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces_products', function (Blueprint $table) {
            $table->id();
            $table -> decimal("price");
            $table -> unsignedBigInteger("workplace_id");
            $table -> unsignedBigInteger("product_id");
            $table -> foreign('workplace_id')->references('id')->on('workplaces');
            $table -> foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workplaces_products');
    }
}
