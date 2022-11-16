<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('name',50);
            $table->string('family_name',50);
            $table->float('rating_avrg');
            $table->string('phone',50);
            $table->string('salon_name',50);
            $table->text('gps_location');
            $table->string('wilaya',50);
            $table->string('comune',50);
            $table->text('address');
            $table->string('start_price',10);
            $table->text('profile_img');
            $table->string('sex',20)->default(null);
            $table->string('dateN',20)->default(null);
            $table->string('category',10)->default(null);
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
        Schema::dropIfExists('barbers');
    }
}
