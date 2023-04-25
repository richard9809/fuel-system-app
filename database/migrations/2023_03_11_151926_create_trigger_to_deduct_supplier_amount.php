<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTriggerToDeductSupplierAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_to_deduct_supplier_amount
            AFTER UPDATE ON transactions
            FOR EACH ROW
            BEGIN
                IF new.receipt IS NOT NULL AND old.receipt IS NULL THEN
                    UPDATE suppliers SET quantity = quantity - new.amount WHERE id = new.supplier;
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
        Schema::dropIfExists('trg_to_deduct_supplier_amount');
    }
}
