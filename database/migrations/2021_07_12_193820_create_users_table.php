<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 60)->nullable(false);
            $table->string('last_name', 60)->nullable(false);
            $table->string('email', 125)->unique()->nullable(false);
            $table->string('password', 125)->nullable(false);
            $table->string('phone_number', 30)->nullable(false);
            $table->string('address', 125)->nullable(false);
            $table->integer('gender')->nullable(true);
            $table->boolean('has_wife')->default('0');
            $table->boolean('has_sons')->default('0');
            $table->boolean('has_driver')->default('0');
            $table->boolean('has_servant')->default('0');
            $table->foreignId('nationality_id')->nullable(true);
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('nationality_id')
                ->references('id')
                ->on('nationalities')
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
        Schema::dropIfExists('users');
    }
}
