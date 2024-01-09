<?php

namespace App\Models\Code\Instructor\Studies;

use App\Models\Code\Member;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_courses';
    protected $guarded = ['id'];
    protected $with = ['instructor'];

    protected $dates = ['timestamp'];

    // Accessor for formatted timestamp
    public function getFormattedTimestampAttribute()
    {
        return $this->attributes['timestamp']->format('D, d-m-Y');
    }

    public function instructor()
    {
        return $this->belongsTo(Member::class, 'instructor_id', 'username');
    }
}
