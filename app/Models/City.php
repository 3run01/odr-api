<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = ['city', 'state'];

    public function legalCases()
    {
        return $this->hasMany(\App\Models\LegalCase::class);
    }

    public function city()
    {
        return $this->hasMany(\App\User::class);
    }
}
