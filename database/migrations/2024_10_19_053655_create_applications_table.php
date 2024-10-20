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
        Schema::create('applications', function (Blueprint $table) {
            $table->foreignId('vacancy_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('gender');
            $table->string('department');
            $table->string('qualification');
            $table->boolean('disabilities')->default(false); // Store as true (yes) or false (no)
            $table->string('GPA');
            $table->string('experience');
            $table->string('resume'); // Store the file path
            $table->id();
            
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
        Schema::dropIfExists('applications');
    }
};
