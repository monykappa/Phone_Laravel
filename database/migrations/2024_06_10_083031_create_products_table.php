<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID
            $table->string('name'); // product name
            $table->string('color'); // color
            $table->year('year'); // year
            $table->string('image')->nullable(); // image
            $table->integer('storage'); // storage
            $table->decimal('price', 8, 2); // price
            $table->integer('ram'); // ram
            $table->string('display'); // display
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
