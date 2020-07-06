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
            $table->string('alias_emprendedor',50)->nullable(); 
            $table->string('nombre',50);
            $table->decimal('precio',12,2)->default(0)->nullable();
            $table->string('detalle')->nullable();            
            $table->boolean('estado')->nullable();
            $table->Integer('existencia')->unsigned()->default(0)->nullable();
            $table->timestamps();

        });
        DB::statement("ALTER TABLE products ADD product_image LONGBLOB");
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
