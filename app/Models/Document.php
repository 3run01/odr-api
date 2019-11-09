<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $table = 'documents';
    protected $fillable = [
        "document",
        "link",
        "legal_case_id",
    ];

    public function legalCase()
    {
        return $this->belongsTo(\App\Models\LegalCase::class);
    }
}
