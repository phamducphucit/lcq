<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPersonPayShippingToStationToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            if(!Schema::hasColumn('orders','person_pay_shipping_to_station','fee_to_station')){
                $table->smallInteger('person_pay_shipping_to_station')->default(1)->comment('1: buyer; 2:saler')->after('money_ship');
                $table->double('fee_to_station', 100, 2)->after('money_ship')->nullable(); 
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
            if(Schema::hasColumn('orders','person_pay_shipping_to_station','fee_to_station'))
            {
                $table->dropColumn('person_pay_shipping_to_station');
                $table->dropColumn('fee_to_station');
            }
        });
    }
}
