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
            $table->enum('trade_origin', array('local', 'import'));
            $table->enum('Catagory', array('fruit', 'vegetables'));
            $table->text('discription')->nullable();
            $table->double('stock', 15, 8)->default(0);
            $table->double('sold', 15, 8)->default(0);
            $table->double('price_buy', 15, 8)->default(0);
            $table->double('price_sale', 15, 8)->default(0);
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
