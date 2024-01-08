<?php

namespace App\Models\Code\Student;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Member;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'student_transactions';
    protected $guarded = ['id'];
    protected $with = ['student', 'course'];

    public function student()
    {
        return $this->belongsTo(Member::class, 'student_id', 'username');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
