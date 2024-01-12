<?php

namespace App\Models\Code\Student;

use App\Models\Code\Instructor\Studies\Courses;
use App\Models\Code\General\Member;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'student_transactions';
    protected $primaryKey = 'order_id';
    protected $keyType = 'string';
    protected $guarded = [''];
    protected $with = ['student', 'course'];
    protected $casts = [
        'created_at' => 'datetime:d-M-Y',
        'updated_at' => 'datetime:d-M-Y',
        'midtrans_data' => 'json',

    ];

    public function student()
    {
        return $this->belongsTo(Member::class, 'student_id', 'username');
    }

    public function course()
    {
        return $this->belongsTo(Courses::class, 'course_id', 'id');
    }
}
