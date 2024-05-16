<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PregnantData extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'pregnant_datas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'trial_code',
        'name',
        'gravidity',
        'parity',
        'age',
        'hr',
        'spo_2',
        'resp_count',
        'sistole',
        'diastole',
        'fetal_hr',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
