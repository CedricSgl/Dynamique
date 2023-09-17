<?php

use App\Models\Wine;
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
            $table->unsignedBigInteger('cepage_id');
            $table->unsignedBigInteger('type_id');
            $table->foreign('cepage_id')->references('id')->on('cepages');
            $table->foreign('type_id')->references('id')->on('types');
            $table->string('image')->nullable();
        });
        Wine::create(['name' => 'A6mani',
        'vintage' => 2016,
        'cepage_id' => 2,
        'type_id' => 3]);
        Wine::create(['name' => 'Agape',
        'vintage' => 2016,
        'cepage_id' => 3,
        'type_id' => 3]);
        Wine::create(['name' => 'Azienda Cesale Vino Nobile',
        'vintage' => 2018,
        'cepage_id' => 1,
        'type_id' => 3]);
        Wine::create(['name' => 'Apaltagua - Envero',
        'vintage' => 2017,
        'cepage_id' => 6,
        'type_id' => 3]);
        Wine::create(['name' => 'Azienda Casale - Di Daviddi Aldimaro',
        'vintage' => 2019,
        'cepage_id' => 1,
        'type_id' => 3]);
        Wine::create(['name' => 'Angelitos Negros',
        'vintage' => 2016,
        'cepage_id' => 4,
        'type_id' => 3]);
        Wine::create(['name' => 'Apaltagua - Reserve',
        'vintage' => 2018,
        'cepage_id' => 5,
        'type_id' => 3]);
        Wine::create(['name' => 'Apaltague - Signature',
        'vintage' => 2015,
        'cepage_id' => 7,
        'type_id' => 3]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
