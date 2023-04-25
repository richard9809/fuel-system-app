<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTrgInsertInTransactionsFromPurchases extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trg_insert_in_transactions_from_purchases
            AFTER INSERT ON purchases
            FOR EACH ROW
            BEGIN
                INSERT INTO reports (supplier, transaction_date, orderNo, product, litres, unitPrice, amount)
                VALUES (NEW.supplier, NEW.date, NEW.orderNo, NULL, NULL, NULL, NEW.amount);
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
        Schema::dropIfExists('trg_insert_in_transactions_from_purchases');
    }
}
