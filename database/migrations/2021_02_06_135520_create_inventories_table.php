<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->enum('origin', array('local', 'import'));
            $table->enum('catagory', array('fruit', 'vegetables'));
            $table->double('stock', 15, 8)->default(0);
            $table->double('sold', 15, 8)->default(0);
            $table->double('priceBuy', 15, 8);
            $table->double('priceSale', 15, 8);
            $table->string('image')->nullable();
            $table->text('discription')->nullable();
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
        Schema::dropIfExists('inventories');
    }
}
