<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    const TABLE = 'payments';
    protected $table = Payment::TABLE;

    protected $fillable = [
        'payment_date',
        'amount'
    ];
}
