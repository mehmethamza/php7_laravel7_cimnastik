<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('workplaces_properties', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("workplace_id");
            $table -> unsignedBigInteger("property_id");
            $table->foreign('workplace_id')->references('id')->on('workplaces') -> cascadeOnDelete();
            $table->foreign('property_id')->references('id')->on('properties') -> cascadeOnDelete();
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
        Schema::dropIfExists('workplaces_properties');
    }
}
