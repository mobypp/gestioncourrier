<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCourrierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_courrier', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('courrier_id');
            $table->unsignedBigInteger('user_id');

            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('validated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('courrier_id')->references('id')->on('courriers')->onDelete('restrict');


            // $table->primary(['courrier_id','user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_courrier');
    }
}
