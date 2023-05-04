<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    protected $table = "user_info";
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'age',
        'gender'
    ];

    public function UserInfoToUser(): BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function UserInfoToMember(): BelongsTo{
        return $this->belongsTo(Member::class);
    }
    public function UserInfoToTrainer(): BelongsTo{
        return $this->belongsTo(Trainer::class);
    }
}
