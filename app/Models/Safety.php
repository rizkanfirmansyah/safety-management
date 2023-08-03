<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\Traits\Timestamp;
use PhpParser\Node\Attribute;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Safety extends Model
{
    use HasFactory;
    use Timestamp;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $lastRecord = static::get()->count();
            $year = date('y');
            $month = date('m');
            $sequence = $lastRecord > 0 ? $lastRecord++ : 1;
            $sequence = str_pad($sequence, 4, '0', STR_PAD_LEFT);

            $model->Number = 'HR' . $sequence . '/' . $month . '/' . $year;
            // $model->save();
        });

        self::creating(function($model) {
            $model->Reporter = IdGenerator::generate(['table' => 'safeties', 'field'=>'reporter', 'length' => 6, 'prefix' => '16026']);
        });

        static::saving(function ($model) {
            // Cek apakah status berubah menjadi "reject"
            if ($model->isDirty('status') && $model->status === 'reject') {
                // Hapus data di kolom "file_response"
                $model->file_response = null;
            }
        });
    }

//     public function getYearTime() : Attribute
// {
//     // return array('created_at', 'updated_at');
//     // Carbon::createFromFormat('Y-m-d H:i:s', $time)->year;

//     $time = "1900-01-01 00:00:00";
//     $date = new Carbon( $time );   
//     $date->year;
// }


    
}
