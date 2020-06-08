<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbigInteger('user_id');            
            $table->unsignedbigInteger('category_id');            
            $table->string('nombre',50)->unique();
            $table->decimal('precio',12,2)->default(0)->nullable();
            $table->string('detalle')->nullable();            
            $table->boolean('estado')->nullable();
            $table->Integer('existencia')->unsigned()->default(0)->nullable();
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('category_id')->references('id')->on('categories');

        });
        DB::statement("ALTER TABLE products ADD product_image LONGBLOB")->nullable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
