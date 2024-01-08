<?php

namespace App\Models\Code\Instructor\Personalize;

use App\Models\Code\Member;
use App\Models\Code\Student\Questions;
use Illuminate\Database\Eloquent\Model;

class Answers extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_answers';
    protected $guarded = ['id'];
    protected $with = ['question', 'instructor'];

    public function question()
    {
        return $this->belongsTo(Questions::class, 'question_id', 'id');
    }

    public function instructor()
    {
        return $this->belongsTo(Member::class, 'instructor_id', 'username');
    }
}
