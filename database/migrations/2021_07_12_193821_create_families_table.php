<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 60);
            $table->string('last_name', 60);
            $table->string('address', 125);
            $table->integer('type');
            $table->foreignId('nationality_id')->nullable(true);
            $table->foreignId('user_id')->nullable(true);
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('families');
    }
}
