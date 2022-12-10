<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficialReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('official_receipts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invoice_id')->unsigned()->nullable()->references('id')->on('invoices')->cascadeOnDelete();
            $table->string('OR_number')->rand(10000, 100000);
            $table->double('amount_paid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('official_receipts');
    }
}
