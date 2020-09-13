<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillGroupParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_group_particulars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bill_group_id')->index();
            $table->foreign('bill_group_id')->references('id')->on('bill_group');
            $table->unsignedBigInteger('society_id')->index();
            $table->foreign('society_id')->references('id')->on('societies');
            $table->string('name', 50)->collation('utf8mb4_general_ci');
            $table->decimal('amount', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_group_particulars');
    }
}
