<?php

namespace App\Models\Code\General;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\Member;
use Illuminate\Database\Eloquent\Model;

class DiscussionForums extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'discussion_forums';
    protected $guarded = ['id'];
    protected $with = ['course', 'student'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Member::class, 'user_id', 'username');
    }
}
