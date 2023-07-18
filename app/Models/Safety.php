<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Safety extends Model
{
    use HasFactory;
    use Timestamp;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastRecord = static::orderBy('id', 'desc')->first();
            $year = date('y');
            $month = date('m');
            $sequence = $lastRecord ? (int)substr($lastRecord->Number, 2, 4) + 1 : 1;
            $sequence = str_pad($sequence, 4, '0', STR_PAD_LEFT);

            $model->Number = 'HR' . $sequence . '/' . $month . '/' . $year;
        });
    }
}
