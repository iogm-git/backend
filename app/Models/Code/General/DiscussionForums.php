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

    protected $dates = ['timestamp'];

    // Accessor for formatted timestamp
    public function getFormattedTimestampAttribute()
    {
        return $this->attributes['timestamp']->format('D, d-m-Y');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Member::class, 'user_id', 'username');
    }
}
