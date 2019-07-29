<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('society_id')->index();
            $table->foreign('society_id')->references('id')->on('societies');
            $table->unsignedBigInteger('authorised_by')->nullable()->index();
            $table->foreign('authorised_by')->references('id')->on('users');
            $table->unsignedBigInteger('expense_category_id')->nullable()->index();
            $table->foreign('expense_category_id')->references('id')->on('expense_category');
            $table->double('amount', 10, 2);
            $table->string('vendor_name', 50);
            $table->date('bill_date')->nullable();
            $table->date('payment_date');
            $table->enum('payment_mode_id', [1, 2, 3]);
            $table->string('cheque_no', 50)->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('expenses');
    }
}
