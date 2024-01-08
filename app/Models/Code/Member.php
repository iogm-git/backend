<?php

namespace App\Models\Code;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'member_data';
    protected $primaryKey = 'username';
    protected $keyType = 'string';
    protected $guarded = [''];
    public $timestamps = false;
    public $incrementing = false;
}
