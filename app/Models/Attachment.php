<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $table = 'attachments';
    protected $fillable = ['attachment', 'link', 'legal_case_id'];

    public function legalCase()
    {
        return $this->belongsTo(\App\Models\legalCase::class);
    }
}
