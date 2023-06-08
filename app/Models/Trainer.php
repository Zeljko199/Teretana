<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trainer extends Model
{
    use HasFactory;
    const TABLE = 'trainers';
    protected $table = Trainer::TABLE;

    protected $fillable = [
        'description',
        'join_date',
        'is_active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
