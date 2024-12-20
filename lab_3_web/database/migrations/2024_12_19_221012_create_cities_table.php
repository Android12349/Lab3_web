<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Запустите миграцию.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->id(); // создаст поле для автоинкрементного ID
            $table->string('name'); // название города
            $table->integer('foundation_year'); // год основания
            $table->string('mayor'); // имя мэра
            $table->string('image'); // картинка города (ссылка или путь к файлу)
            $table->text('description'); // краткое описание
            $table->timestamps(); // метки времени (created_at, updated_at)
        });
    }

    /**
     * Откатить миграцию.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
