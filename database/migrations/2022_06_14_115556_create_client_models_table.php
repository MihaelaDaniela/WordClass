<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('club_id');
            $table->string('name');
            $table->integer('gender');
            $table->text('adress');
            $table->string('email');
            $table->integer('phone_number');
            $table->string('trainer_name');
            $table->timestamp('birth_date')->nullable();
            $table->string('subscription_name');
            $table->string('subscription_type');
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
        Schema::dropIfExists('client_models');
    }
}
