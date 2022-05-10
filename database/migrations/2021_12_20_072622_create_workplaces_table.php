<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("user_id");
            $table -> foreign('user_id')->references('id')->on('users');
            $table -> string("title");
            $table -> string("slug");
            $table -> string("country");
            $table -> string("province");
            $table -> string("district");
            $table -> string("zip");
            $table -> string("full_adress");
            $table -> string("location");
            $table -> string("tax_number");
            $table -> string("status");
            $table -> bigInteger("click_rate")->default("0");
            $table -> string("notice")->nullable();
            $table -> string("youtube_embed")->nullable();
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
        Schema::dropIfExists('workplaces');
    }
}
