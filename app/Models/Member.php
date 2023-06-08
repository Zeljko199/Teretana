<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    use HasFactory;
    const TABLE = 'members';
    protected $table = Member::TABLE;

    const ACTIVE = 'active';
    const INACTIVE = 'inactive';

    protected $fillable = [
        'join_date',
        'end_of_membership_date',
        'is_active'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeActive($query)
    {
        return $query->where('is_active', '=', Member::ACTIVE);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', '=', Member::INACTIVE);
    }
    public function scopeRecent($query)
    {
        return $query->where('created_at', '<=', Carbon::today())->take(10)->orderBy('created_at', 'desc');
    }
}
