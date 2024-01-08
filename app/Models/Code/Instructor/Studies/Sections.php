<?php

namespace App\Models\Code\Instructor\Studies;

use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_sections';
    protected $guarded = ['id'];
    protected $with = ['course'];

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
