<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrgInsertInTransactionsFromTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::unprepared('
            CREATE TRIGGER trg_insert_in_transactions_from_transactions_table
            AFTER UPDATE ON transactions
            FOR EACH ROW
            BEGIN 
                DECLARE vehicle_name VARCHAR(255);
                DECLARE product_name VARCHAR(255);
                SELECT regNo INTO vehicle_name FROM vehicles WHERE id = NEW.vehicle;
                SELECT name INTO product_name FROM products WHERE id = NEW.product;
                IF new.receipt IS NOT NULL AND old.receipt IS NULL THEN
                    INSERT INTO reports (supplier, transaction_date, vehicle, orderNo, product, litres, unitPrice, amount)
                    VALUES (NEW.supplier, NEW.requestDate, vehicle_name, NEW.detailOrder, product_name, NEW.quantity, NEW.unitPrice, NEW.amount);
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
        Schema::dropIfExists('trg_insert_in_transactions_from_transactions');
    }
}
