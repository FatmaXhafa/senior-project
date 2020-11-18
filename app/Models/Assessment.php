<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function exam() {
        return $this->belongsTo(Exam::class);
    }

    public function responses() {
        return $this->hasMany(AssessmentResponse::class);
    }
}
