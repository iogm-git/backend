<?php

namespace App\Models\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Member;
use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    public $timestamps = false;
    protected $connection = 'pgsql';

    protected $table = 'instructor_earnings';
    protected $guarded = ['id'];
    protected $with = ['course', 'student'];

    protected $dates = ['recorded_at'];

    // Accessor for formatted timestamp
    public function getFormattedTimestampAttribute()
    {
        return $this->attributes['recorded_at']->format('D, d-m-Y');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Member::class, 'student_id', 'username');
    }
}
