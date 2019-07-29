<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('society_id')->index();
            $table->foreign('society_id')->references('id')->on('societies');
            $table->unsignedBigInteger('wing_id')->nullable()->index();
            $table->foreign('wing_id')->references('id')->on('wings');
            $table->unsignedBigInteger('flat_status_id')->nullable()->index();
            $table->foreign('flat_status_id')->references('id')->on('flat_status');
            $table->string('flat_no', 50)->collation('utf8mb4_general_ci');
            $table->double('sq_foot', 8, 2);
            $table->string('owner_fn', 50);
            $table->string('owner_ln', 50);
            $table->bigInteger('owner_number');
            $table->string('intercom', 20)->nullable();
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
        Schema::dropIfExists('flats');
    }
}
