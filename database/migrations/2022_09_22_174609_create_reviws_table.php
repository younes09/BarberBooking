<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviwsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviws', function (Blueprint $table) {
            $table->id();
            $table->integer('rating',0,0);
            $table->string('comment');
            $table->foreignId('customer_id')->constrained('customers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('barber_id')->constrained('barbers')->cascadeOnDelete()->cascadeOnUpdate();
            $table->boolean('state_of_approvment')->default(0);
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
        Schema::dropIfExists('reviws');
    }
}
