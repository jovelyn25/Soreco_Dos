<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mail;
use Illuminate\Support\Facades\Storage;

class PsiSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'notice_date',
        'notice_time',
        'notice_areas',
        'notice_reasons',
    ];
}
