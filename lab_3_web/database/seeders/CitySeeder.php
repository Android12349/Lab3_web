<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Заполнить базу данных начальными данными.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'name' => 'Лиссабон',
            'foundation_year' => 1179,
            'mayor' => 'Карлуш Муэдаш',
            'image' => 'laravel/lissabon.jpg',
            'description' => 'Столица Португалии.',
        ]);

        DB::table('cities')->insert([
            'name' => 'Вила-Нова-ди-Гая',
            'foundation_year' => 1255,
            'mayor' => 'Луиш Фелипи Менезиш',
            'image' => 'laravel/vila.jpg',
            'description' => 'Именно здесь, а не в Порту, как иногда ошибочно считают, находятся знаменитые винные погреба с португальским портвейном.',
        ]);

        DB::table('cities')->insert([
            'name' => 'Эвора',
            'foundation_year' => 1166,
            'mayor' => 'Эрнесту Оливейра',
            'image' => 'laravel/evora.jpg',
            'description' => 'Эвора является городом-музеем и внесена в список Всемирного наследия ЮНЕСКО.',
        ]);

        DB::table('cities')->insert([
            'name' => 'Порту',
            'foundation_year' => 1123,
            'mayor' => 'Руй Морейра',
            'image' => 'laravel/porto.jpg',
            'description' => 'ФК «Порту» один из трёх сильнейших футбольных клубов в Португалии. Двукратный победитель (1986/1987 и 2003/2004) Лиги чемпионов УЕФА.',
        ]);

        DB::table('cities')->insert([
            'name' => 'Лагуш',
            'foundation_year' => 1255,
            'mayor' => 'Жулиу Баррозу',
            'image' => 'laravel/lagush.jpg',
            'description' => '37°06′ с. ш. 8°40′ з. д.',
        ]);
    }
}

