<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToUpdateVehicleMileage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_to_update_vehicle_mileage
            AFTER INSERT ON transactions
            FOR EACH ROW
            BEGIN
                UPDATE vehicles SET mileage = NEW.vehicleMileage WHERE id = NEW.vehicle;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trg_to_update_vehicle_mileage');
    }
}
