<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incomes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('society_id')->index();
            $table->foreign('society_id')->references('id')->on('societies');
            $table->unsignedBigInteger('income_category_id')->nullable()->index();
            $table->foreign('income_category_id')->references('id')->on('income_category');
            $table->double('amount', 10, 2);
            $table->date('payment_date');
            $table->enum('payment_mode_id', [1, 2, 3]);
            $table->string('cheque_no', 50)->nullable();
            $table->text('received_from')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable()->index();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incomes');
    }
}
