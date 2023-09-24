<?php

namespace Database\Seeders;

use App\Models\Wine;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        self::copyFile('01.jpg');
        Wine::create(['name' => 'A6mania',
            'vintage' => 2016,
            'cepage_id' => 2,
            'type_id' => 3,
            'image' => "wine/01.jpg"
        ]);

        self::copyFile('02.jpg');
        Wine::create(['name' => 'Agape',
        'vintage' => 2016,
        'cepage_id' => 3,
        'type_id' => 3,
        'image' => "wine/02.jpg"]);
        $file = '03.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Azienda Cesale Vino Nobile',
        'vintage' => 2018,
        'cepage_id' => 1,
        'type_id' => 3,
        'image' => "wine/$file"
        ]);
        $file = '04.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Apaltagua - Envero',
        'vintage' => 2017,
        'cepage_id' => 6,
        'type_id' => 3,
        'image' => "wine/$file"]);
        $file = '05.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Azienda Casale - Di Daviddi Aldimaro',
        'vintage' => 2019,
        'cepage_id' => 1,
        'type_id' => 3,
        'image' => "wine/$file"]);
        $file = '06.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Angelitos Negros',
        'vintage' => 2016,
        'cepage_id' => 4,
        'type_id' => 3,
        'image' => "wine/$file"]);
        $file = '07.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Apaltagua - Reserve',
        'vintage' => 2018,
        'cepage_id' => 5,
        'type_id' => 3,
        'image' => "wine/$file"]);
        $file = '08.jpg';
        self::copyFile($file);
        Wine::create(['name' => 'Apaltague - Signature',
        'vintage' => 2015,
        'cepage_id' => 7,
        'type_id' => 3,
        'image' => "wine/$file"]);


    }

    public static function copyFile($file){
        $sourcePath = public_path("/images/$file");
        $destinationPath = storage_path("app/public/wine/$file");
        if (file_exists($sourcePath)) {if (copy($sourcePath, $destinationPath)) { }}
    }
}
