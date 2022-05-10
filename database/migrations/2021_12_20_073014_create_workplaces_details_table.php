<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces_details', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("workplace_id") ;
            $table -> foreign('workplace_id')->references('id')->on('workplaces') -> cascadeOnDelete();
            $table -> text("content");
            $table -> string("phone");
            $table -> string("facebook") -> nullable();
            $table -> string("instagram") -> nullable();
            $table -> string("email") -> nullable();
            $table -> string("twitter") -> nullable();
            $table -> string("youtube") -> nullable();
            $table -> string("web") -> nullable();
            $table -> string("payment_date")->nullable();
            $table -> string("payment_code")->nullable();
            $table -> string("payment_total")->nullable();
            $table -> timestamps();
            $table -> softDeletes();
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
        Schema::dropIfExists('workplaces_details');
    }
}
