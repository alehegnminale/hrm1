<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
     
            $table->string('job_title');
            $table->text('job_description');
            $table->string('company_name');
            $table->string('location');
            $table->decimal('salary_range', 10, 2);
            $table->date('application_deadline');
            $table->boolean('posted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.zz
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacancies');
    }
};
