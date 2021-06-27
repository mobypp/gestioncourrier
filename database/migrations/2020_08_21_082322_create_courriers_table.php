<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courriers', function (Blueprint $table) {
            $table->increments('id');
			$table->string('matricule');
            $table->string('titre');
			$table->unsignedBigInteger('organisme_id');

			$table->foreign('organisme_id')
				->references('id')
				->on('organismes')
				->onDelete('cascade');
				
			$table->string('objet');
            $table->text('contenu');
            $table->boolean('etat')->default('1');
			$table->string('image');
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
        Schema::dropIfExists('courriers');
    }
}
