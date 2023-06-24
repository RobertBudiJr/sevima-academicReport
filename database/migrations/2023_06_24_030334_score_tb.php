<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('score_tb', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->bigInteger('id_student')->unsigned();
            $table->bigInteger('math');
            $table->bigInteger('indonesian');
            $table->bigInteger('english');
            $table->bigInteger('science');
            $table->bigInteger('programming');
            $table->bigInteger('average');

            $table->foreign('id_student')->references('id')->on('student_tb')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
