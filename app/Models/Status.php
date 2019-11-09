<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $fillable = [
        'status'
    ];

    public function legalCases()
    {
        return $this->hasMany(\App\Models\LegalCase::class);
    }
}
