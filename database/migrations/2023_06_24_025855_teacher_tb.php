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
        Schema::create('teacher_tb', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->string('teacher_name', 255);
            $table->bigInteger('id_class')->unsigned();
            $table->string('username', 255);
            $table->string('password', 255);

            $table->foreign('id_class')->references('id')->on('class_tb')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_tb');
    }
};
