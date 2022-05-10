<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces_comments', function (Blueprint $table) {
            $table->id();
            $table -> unsignedBigInteger("workplace_id");
            $table -> unsignedBigInteger("user_id");
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('workplace_id')->references('id')->on('workplaces');
            $table -> string("status");
            $table -> string("type");
            $table -> integer("pid")->default(0);
            $table -> text("comment");
            $table -> decimal("rating_service",2,1);
            $table -> decimal("rating_communacation",2,1);
            $table -> decimal("rating_advice",2,1);
            $table -> decimal("rating_average",2,1);
            $table -> string("name");
            $table -> string("email");

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
        Schema::dropIfExists('workplaces_comments');
    }
}
