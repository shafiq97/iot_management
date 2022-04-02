<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string("device_id");
            $table->string("device_type");
            $table->string("device_unit");
            $table->double("device_reading");
            $table->string("device_location");
            $table->string("device_status");
            $table->string("device_health");
            $table->string("device_uptime");
            $table->string("device_ip");
            $table->string("device_subnet");
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
        Schema::dropIfExists('devices', function (Blueprint $table){
            $table->dropForeign('lists_user_id_foreign');
            $table->dropIndex('lists_user_id_index');
            $table->dropColumn('user_id');
        });
    }
}
