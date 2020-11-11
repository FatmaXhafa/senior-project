<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function path() {
        return url('/exams/' . $this->id);
    } 

    public function publicpath() {
        return url('/assessments/' . $this->id.'-'.Str::slug($this->title));
    } 

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }

    public function assessments() {
        return $this->hasMany(Assessment::class);
    }
}

