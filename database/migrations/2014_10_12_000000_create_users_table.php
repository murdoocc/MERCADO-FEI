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
            $table->string('matricula');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('foto',30);
            $table->string('alias',18);
            $table->string('numero_tel',15);
            $table->string('carrera',50);
            $table->string('ubicacion',20)->nullable();
            $table->string('horario',20)->nullable();
            $table->string('estatus',10)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
