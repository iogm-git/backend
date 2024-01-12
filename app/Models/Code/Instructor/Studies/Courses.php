<?php

namespace App\Models\Code\Instructor\Studies;

use App\Models\Code\General\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $table = 'instructor_courses';
    protected $guarded = ['id'];
    protected $with = ['instructor'];
    protected $casts = [
        'created_at' => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y'

    ];

    public function instructor()
    {
        return $this->belongsTo(Member::class, 'instructor_id', 'username');
    }
}
