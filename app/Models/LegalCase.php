<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    protected $table = 'legal_cases';
    protected $fillable = [
        "uuid",
        "name",
        "cpf",
        "city_id",
        "company_name",
        "company_category",
        "user_id",
        "status_id"
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->uuid = (string) \Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function documents()
    {
        return $this->hasMany(\App\Models\Document::class);
    }

    public function attachments()
    {
        return $this->hasMany(\App\Models\Attachment::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class);
    }
}
