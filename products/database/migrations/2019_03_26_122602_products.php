<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->integer('qty');
            $table->integer('cprice');
            $table->integer('sprice');
            $table->integer('amount_instock')->nullable();
            $table->date('expdate')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('supplier_certificate')->nullable();
        }

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pdts');
    }
}
