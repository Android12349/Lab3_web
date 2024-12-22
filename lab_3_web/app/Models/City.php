<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class City extends Model
{
    use HasFactory, SoftDeletes;

    // Указываем таблицу
    protected $table = 'cities';

    // Поля, доступные для массового заполнения
    protected $fillable = [
        'name',
        'foundation_year',
        'mayor',
        'image',
        'description',
        'user_id',
    ];

    // Поля, которые будут автоматически кастоваться как даты
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at', // Для Soft Deletes
    ];

    // Мутатор для преобразования foundation_year
    public function setFoundationYearAttribute($value)
    {
        $this->attributes['foundation_year'] = (int)$value;
    }

    // Аксессор для преобразования created_at
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    // Аксессор для преобразования updated_at
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
