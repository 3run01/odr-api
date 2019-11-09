<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentCompany extends Model
{
    protected $table = 'segments_companies';
    protected $fillable = ['segment'];
}
