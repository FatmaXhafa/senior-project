<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
