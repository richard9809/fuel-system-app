<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToUpdateKmTravelled extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_to_update_km_travelled
            BEFORE INSERT ON transactions
            FOR EACH ROW
            BEGIN
                DECLARE v_mileage INT;
                SELECT mileage INTO v_mileage FROM vehicles WHERE id = NEW.vehicle;
                SET NEW.kmTravelled = NEW.vehicleMileage - v_mileage;
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
        Schema::dropIfExists('trg_to_update_km_travelled');
    }
}
