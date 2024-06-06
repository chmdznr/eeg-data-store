<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewbornData extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'newborn_datas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'trial_code',
        'name',
        'mother_name',
        'mother_age',
        'gravidity',
        'parity',
        'accel_x',
        'accel_y',
        'accel_z',
        'thermal',
        'pulse',
        'spo_2',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
