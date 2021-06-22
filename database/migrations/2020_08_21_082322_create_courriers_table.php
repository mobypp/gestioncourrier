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
            $table->string('id');
            $table->string('titre');
            $table->string('contenu');
            $table->string('sens');
            $table->string('objet');
            $table->string('etat');
			$table->integer('organisme')->unsigned();

			$table->foreign('organisme')
				->references('id')
				->on('organismes')
				->onDelete('cascade');
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
