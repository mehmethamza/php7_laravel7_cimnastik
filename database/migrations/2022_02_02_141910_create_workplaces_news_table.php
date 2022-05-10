<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces_news', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("workplace_id");
            $table->foreign('workplace_id')->references('id')->on('workplaces') -> cascadeOnDelete();
            $table->string("image");
            $table->string("title");
            $table->text("content");

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
        Schema::dropIfExists('workplaces_news');
    }
}
