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
        Schema::create('article_tb', function (Blueprint $table) {
            $table->bigIncrements('id', 11);
            $table->bigInteger('id_teacher')->unsigned();
            $table->bigInteger('id_class')->unsigned();
            $table->string('title', 255);
            $table->text('content');
            $table->timestamp('published_at');
            $table->string('subject', 255);

            $table->foreign('id_teacher')->references('id')->on('teacher_tb')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('article_tb');
    }
};
