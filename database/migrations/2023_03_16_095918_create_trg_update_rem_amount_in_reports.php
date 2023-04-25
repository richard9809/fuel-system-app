<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrgUpdateRemAmountInReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE OR REPLACE TRIGGER trg_update_remAmount_in_reports
            BEFORE INSERT ON reports
            FOR EACH ROW
            BEGIN
                DECLARE prev_remAmount DECIMAL(20,2);
            
                BEGIN
                    SELECT remAmount INTO prev_remAmount FROM reports WHERE supplier = NEW.supplier ORDER BY id DESC LIMIT 1;
                END;
            
                IF prev_remAmount IS NULL THEN
                    SET NEW.remAmount = NEW.amount;
                ELSEIF NEW.unitPrice IS NOT NULL THEN
                    SET NEW.remAmount = prev_remAmount - NEW.amount;
                ELSE
                    SET NEW.remAmount = prev_remAmount + NEW.amount;
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
        Schema::dropIfExists('trg_update_rem_amount_in_reports');
    }
}
