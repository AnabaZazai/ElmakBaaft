<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptcartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receiptcarts', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('product_id')->constrained('products')->onUpdate('cascade')->onDelate('set null')->nullable();
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
        Schema::dropIfExists('receiptcarts');
    }
}
