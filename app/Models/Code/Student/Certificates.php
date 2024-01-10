<?php

namespace App\Models\Code\Student;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\General\Member;
// use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $connection = 'pgsql';

    protected $keyType = 'string';
    protected $table = 'student_certificates';
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
