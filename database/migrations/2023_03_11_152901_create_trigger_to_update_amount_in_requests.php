<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToUpdateAmountInRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_to_update_amount_in_requests
            BEFORE UPDATE ON transactions
            FOR EACH ROW
            BEGIN
                IF new.unitPrice IS NOT NULL AND new.amount IS NOT NULL THEN
                    SET new.amount = new.unitPrice * new.quantity;
                END IF;
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
        Schema::dropIfExists('trg_to_update_amount_in_requests');
    }
}
