<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCovidDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covid_details', function (Blueprint $table) {
            $table->id();
            $table->string('Local_Deaths');
            $table->string('Local_Total_Cases');
          $table->string('Local_New_Deaths');
           $table->string('Local_Recovered');
          $table->string('Local_Active_Cases');
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
        Schema::dropIfExists('covid_details');
    }
}
