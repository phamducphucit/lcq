<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('user_id_create')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name_receiver')->nullable();
            $table->string('address_receiver')->nullable();
            $table->string('phone_receiver')->nullable();
            $table->string('note')->nullable();
            $table->double('cod', 100, 2)->nullable();
            $table->smallInteger('cod_status')->default(1)->comment('1:No money yet; 2:took the money');
            $table->double('price_order', 100, 2)->nullable();
            $table->string('tracking_number')->nullable();
            $table->smallInteger('person_pay_shipping')->default(1)->comment('1: buyer; 2:saler');
            $table->double('money_ship', 100, 2)->nullable(); 
            $table->date('ship_date')->nullable();
            $table->string('qr_code')->nullable();
            $table->string('image_qr')->nullable();
            $table->smallInteger('status')->default(1)->comment('1: Pending; 2: Approved; 3: Shipping; 4: Delivered; 5: Canceled');
            $table->smallInteger('payment_status')->default(1)->comment('1:unpaid; 2:paid');
            $table->string('reason_reject')->nullable();
            $table->date('order_date');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
