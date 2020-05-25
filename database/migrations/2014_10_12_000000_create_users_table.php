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
            $table->bigIncrements('id');            
            $table->string('alias',18);
            $table->string('password',30);
            $table->string('name',30);
            $table->string('apellido_p',30);
            $table->string('apellido_m',30);
            $table->string('email',50)->unique();
            $table->string('number_tel',15);
            $table->string('carrera',50);
            $table->boolean('estatus');
            $table->timestamps();                      
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
        DB::statement("ALTER TABLE users ADD user_image LONGBLOB");
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
