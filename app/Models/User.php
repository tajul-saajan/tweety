<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use Followable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function timeline()
    {
        $ids = $this->follows->pluck('id');
        $ids->push($this->id);

        return Tweet::whereIn('user_id', $ids)->latest()->get();
    }

    public function tweets()
    {
        return $this->hasMany(Tweet::class);
    }

    public function getAvatarAttribute()
    {
        return 'https://i.pravatar.cc/200?u=' . $this->email;
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function path($append='')
    {
        $path = route('profile', $this->username);
        return $append ? "{$path}/{$append}" : $path;
    }
}
