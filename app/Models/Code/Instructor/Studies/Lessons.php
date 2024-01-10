<?php

namespace App\Models\Code\Instructor\Studies;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'instructor_lessons';
    protected $guarded = ['id'];
    protected $with = ['section'];
    protected $casts = [
        'created_at' => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'

    ];

    public function section()
    {
        return $this->belongsTo(Sections::class, 'section_id', 'id');
    }
}
