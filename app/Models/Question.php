<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'options',
    ];

    public function exam(){
        return $this->belongsTo(Exam::class);
    }
}
