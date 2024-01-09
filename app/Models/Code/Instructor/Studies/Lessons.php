<?php

namespace App\Models\Code\Instructor\Studies;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_lessons';
    protected $guarded = ['id'];
    protected $with = ['section'];

    protected $dates = ['timestamp'];

    // Accessor for formatted timestamp
    public function getFormattedTimestampAttribute()
    {
        return $this->attributes['timestamp']->format('D, d-m-Y');
    }

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id', 'id');
    }
}
