<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
        'uuid',
        "first_name",
        "last_name",
        "phone_number1",
        "email",
        "oab",
        "oab_uf",
        "password",
        "photo",
        "city_id"
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
    
    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = (string) \Str::uuid();
        });
    }
    
    public function cases()
    {
        return $this->hasMany(\App\Models\UserCase::class);
    }
    
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }
}
