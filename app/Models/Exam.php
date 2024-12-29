<?php

namespace App\Models;

use App\Enum\ExamStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'start',
        'end',
        'description',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'start' => 'datetime',
            'end' => 'datetime',
            'status' => ExamStatus::class,
        ];
    }

    public function course(){

        return $this->belongsTo(Course::class);
    }

    public function question(){
        return $this->hasMany(Question::class);
    }
}
