<?php

namespace Database\Seeders;

use App\Models\Cepage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CepageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cepage::create(['name' => 'Vino Nobile di Montepulciano']);
        Cepage::create(['name' => 'Salice Salentino']);
        Cepage::create(['name' => 'Bordeaux']);
        Cepage::create(['name' => 'Toro']);
        Cepage::create(['name' => 'non']);
        Cepage::create(['name' => 'Colchagua Valley']);
        Cepage::create(['name' => 'Maipo Valley']);
    }
}
