<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supplier');
            $table->date('transaction_date');
            $table->string('vehicle')->default('LPO');
            $table->string('orderNo');
            $table->string('product')->nullable();
            $table->string('litres')->nullable();
            $table->string('unitPrice')->nullable();
            $table->decimal('amount', 10, 2);
            $table->decimal('remAmount', 10, 2)->default(0);
            $table->timestamps();
            $table->foreign('supplier')
                ->references('id')
                ->on('suppliers')
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
        Schema::dropIfExists('reports');
    }
}
