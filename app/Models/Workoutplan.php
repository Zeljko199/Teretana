<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workoutplan extends Model
{
    use HasFactory;
    const TABLE = 'workoutplans';
    protected $table = Workoutplan::TABLE;

    protected $fillable = [
        'name',
        'description'
    ];

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_FINISHED = 'finished';

    const STATUSES = [
        self::STATUS_ACTIVE,
        self::STATUS_INACTIVE,
        self::STATUS_FINISHED
    ];

    public static function boot(){
        parent::boot();

        static::saving(function ($model){
            if (!in_array($model->status, self::STATUSES))
                throw new \Exception('Invalid status');
        });
    }
}
