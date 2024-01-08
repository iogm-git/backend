<?php

namespace App\Models\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Member;
use Illuminate\Database\Eloquent\Model;

class CourseReviews extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_course_reviews';
    protected $guarded = ['id'];
    protected $with = ['course', 'student'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Member::class, 'student_id', 'username');
    }
}
