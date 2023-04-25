<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product');
            $table->unsignedBigInteger('vehicle');
            $table->unsignedBigInteger('driver');
            $table->decimal('quantity', 10, 0);
            $table->float('unitPrice')->nullable();
            $table->decimal('amount', 10, 2)->default(0);
            $table->integer('wkt_no');
            $table->decimal('vehicleMileage', 10, 0);
            $table->integer('kmTravelled')->default(0);
            $table->date('requestDate');
            $table->integer('approved')->default(0);
            $table->unsignedBigInteger('approvedBy')->nullable();
            $table->string('detailOrder')->nullable()->unique();
            $table->string('receipt')->nullable()->unique();
            $table->unsignedBigInteger('supplier')->nullable();
            $table->integer('rejected')->default(0);
            $table->timestamps();
            $table->foreign('supplier')
                    ->references('id')
                    ->on('suppliers')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('approvedBy')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('driver')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('vehicle')
                    ->references('id')
                    ->on('vehicles')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('product')
                    ->references('id')
                    ->on('products')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
