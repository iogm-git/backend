<?php

namespace App\Models\Shop\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Types extends Model
{
    use HasFactory;
    protected $table = 'web_types';
    public $timestamps = false;
}
