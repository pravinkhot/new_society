<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserFlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_flat', function (Blueprint $table) {
            $table->unsignedBigInteger('society_id')->nullable()->index();
            $table->foreign('society_id')->references('id')->on('societies');

            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('flat_id')->nullable()->index();
            $table->foreign('flat_id')->references('id')->on('flats');

            $table->tinyInteger('owner_tenant')->nullable()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_flat');
    }
}
