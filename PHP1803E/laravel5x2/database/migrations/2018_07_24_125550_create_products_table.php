<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //cho phep tao khoa ngoai cho bang
        Schema::enableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('catid')->unsigned();
            $table->integer('sizeid')->unsigned();
            $table->string('namdpd',180);
            $table->text('imagepd');
            $table->float('pricepd',8,2);
            $table->float('saleoff')->nullable();
            $table->tinyInteger('statuspd')->default(1);
            $table->integer('qtypd');
            $table->text('despd');
            $table->timestamps();

            //lien ket khoa ngoai toi cac bang khac
            $table->foreign('catid')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('sizeid')->references('id')->on('sizes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
