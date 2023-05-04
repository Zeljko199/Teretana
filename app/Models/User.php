<?php
//    Model ima pristup bazi podataka i moze rukovati podacima baze
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    const TYPE_ADMIN = 'admin';
    const TYPE_TRAINER = 'trainer';
    const TYPE_MEMBER = 'member';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserToUserInfo(): HasOne{
        return $this->hasOne(UserInfo::class);
        // pozivanje: $phone = User::find(1)->phone;
    }

    public function getRoleAttribute(){
        return $this->attributes['role'];
    }

    public function  isAdmin(){
        return $this->role === 'admin';
    }
    public function isTrainer(){
        return $this->role === 'trainer';
    }
    public function isMember(){
        return $this->role === 'member';
    }
}
