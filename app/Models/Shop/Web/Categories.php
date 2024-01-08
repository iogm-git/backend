<?php

namespace App\Models\Shop\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'web_categories';
    public $timestamps = false;
}
