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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->year('vintage');
            $table->string('img_path');
            $table->unsignedBigInteger('cepage_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('cepage_id')->references('id')->on('cepages');
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
