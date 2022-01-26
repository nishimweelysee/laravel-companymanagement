<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("company_id");
            $table->string("name");
            $table->string("surname");
            $table->string("employeeNumber");
            $table->string("email");
            $table->string("telephoneNumber");
            $table->date("startDate");
            $table->timestamps();
            $table->index("company_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
