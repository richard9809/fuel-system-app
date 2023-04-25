<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToAddSupplierAmountOk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_to_add_supplier_amount_OK
            AFTER INSERT ON purchases
            FOR EACH ROW
            BEGIN
                UPDATE suppliers SET quantity = quantity + NEW.amount, budget = quantity WHERE id = NEW.supplier;
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
        Schema::dropIfExists('trg_to_add_supplier_amount_OK');
    }
}
