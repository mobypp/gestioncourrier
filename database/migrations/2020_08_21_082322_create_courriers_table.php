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
            $table->id();
			$table->string('matricule')->nullable();
            $table->string('titre')->nullable();
			$table->unsignedBigInteger('organisme_id')->nullable();

			$table->foreign('organisme_id')
				->references('id')
				->on('organismes')
				->onDelete('cascade');
				
			$table->string('objet')->nullable();
            $table->text('contenu')->nullable();
            $table->boolean('etat')->default('1');
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
