<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('import_detail', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('imports_id');
            $table->BigInteger('product_id');
            $table->string('name_product')->nullable();
            $table->integer('quantity_before_entering')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('quantity_after_entering')->nullable();
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
        Schema::dropIfExists('import_detail');
    }
}
