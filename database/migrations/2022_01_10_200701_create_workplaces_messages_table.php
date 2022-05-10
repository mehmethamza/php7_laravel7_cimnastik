<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkplacesMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('workplaces_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("workplace_id");
            $table->foreign("workplace_id")->references("id")->on("workplaces")->onDelete("cascade");
            $table->unsignedBigInteger("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->string("name");
            $table->string("phone");
            $table->string("email");
            $table->string("message");
            $table->string("preferred_contact");
            $table->string("reply")->default(false);
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
        Schema::dropIfExists('workplaces_messages');
    }
}
