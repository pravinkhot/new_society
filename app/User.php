<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Set the date of birth format.
     *
     * @param  string  $value
     * @return void
     */
    public function setDobAttribute($value)
    {
        $value = Carbon::parse($value)->toDateString();
        $this->attributes['dob'] = $value;
    }

    /**
     * Get dob in DD-MM-YYYY.
     *
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Get associated society with this user.
     */
    public function getUserSocieties()
    {
        return $this->hasMany('App\Models\UserSociety', 'user_id');
    }
}
