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

    public function instructor()
    {
        return $this->belongsTo(Member::class, 'instructor_id', 'username');
    }
}
