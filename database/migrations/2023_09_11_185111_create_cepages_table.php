<?php

use App\Models\Cepage;
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
        Schema::create('cepages', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });
        Cepage::create(['name' => 'Vino Nobile di Montepulciano']);
        Cepage::create(['name' => 'Salice Salentino']);
        Cepage::create(['name' => 'Bordeaux']);
        Cepage::create(['name' => 'Toro']);
        Cepage::create(['name' => 'non']);
        Cepage::create(['name' => 'Colchagua Valley']);
        Cepage::create(['name' => 'Maipo Valley']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cepages');
    }
};
