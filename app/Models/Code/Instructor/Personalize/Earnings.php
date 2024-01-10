<?php

namespace App\Models\Code\Instructor\Personalize;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\General\Member;
use Illuminate\Database\Eloquent\Model;

class Earnings extends Model
{
    public $timestamps = false;
    protected $connection = 'pgsql';

    protected $table = 'instructor_earnings';
    protected $guarded = ['id'];
    protected $with = ['course', 'student'];
    protected $casts = [
        'created_at' => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'

    ];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Member::class, 'student_id', 'username');
    }
}
