<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLandmarksTable extends Migration
{
    public function up()
    {
        Schema::create('landmarks', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Название достопримечательности
            $table->text('description'); // Описание
            $table->foreignId('city_id')->constrained()->onDelete('cascade'); // Связь с городом
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Кто добавил
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('landmarks');
    }
};
