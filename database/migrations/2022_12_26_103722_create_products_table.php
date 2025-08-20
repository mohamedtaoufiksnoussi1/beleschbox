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
            $table->id();
            $table->integer('rank');
            $table->string('name')->nullable();
            $table->string('positionNumber')->nullable();
            $table->string('product_title')->nullable();
            $table->string('image')->nullable();
            $table->string('altTag')->nullable();
            $table->string('titleTag')->nullable();
            $table->enum('measurement',  ['ml', 'gm', 'pieces'])->default('ml');
            $table->longText('contents')->nullable();
            $table->decimal('price',6,2)->default('00.00');
            $table->string('size_availability')->nullable();
            $table->enum('status',  ['0', '1'])->default('0');
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
        Schema::dropIfExists('products');
    }
}
