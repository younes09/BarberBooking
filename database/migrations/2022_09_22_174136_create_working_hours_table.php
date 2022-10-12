<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkingHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workingHours', function (Blueprint $table) {
            $table->id();
            $table->string('dimanche',15);
            $table->string('lundi',15);
            $table->string('mardi',15);
            $table->string('mercredi',15);
            $table->string('jeudi',15);
            $table->string('vendredi',15);
            $table->string('samedi',15);
            $table->string('time_from',15);
            $table->foreignId('barber_id')->constrained('barbers')->cascadeOnDelete()->cascadeOnUpdate();
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
        Schema::dropIfExists('workingHours');
    }
}
