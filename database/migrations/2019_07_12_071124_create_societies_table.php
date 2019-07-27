<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocietiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 255)->collation('utf8mb4_general_ci');
            $table->string('desired_subdomain', 50)->collation('utf8mb4_general_ci');
            $table->text('address1');
            $table->text('address2')->nullable(true);
            $table->string('city', 255)->nullable(true);
            $table->string('state', 255);
            $table->integer('country_id');
            $table->char('pincode', 6);
            $table->string('registration_number', 255)->nullable(true);
            $table->timestamp('subscrition_expiry_date');
            $table->timestamps();
            $table->softDeletes();
            $table->index('country_id');
            $table->foreign('country_id')->references('id')->on('count');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('society_main');
    }
}
