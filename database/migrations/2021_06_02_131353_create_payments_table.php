<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->text('payment_id');
            $table->integer('user_id');
            $table->integer('amount_money');
            $table->string('subscription');
            $table->string('currency');
            $table->string('status');
            $table->string('order_id');
            $table->string('receipt_number');
            $table->string('receipt_url');
            $table->string('entry_method');
            $table->string('payment_created_at');
            $table->string('payment_updated_at');
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
        Schema::dropIfExists('payments');
    }
}
