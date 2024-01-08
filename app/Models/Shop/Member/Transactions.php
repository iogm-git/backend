<?php

namespace App\Models\Shop\Member;

use App\Models\Shop\Web\Details;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    public $timestamps = false;
    protected $table = 'member_transactions';
    protected $with = ['web'];
    protected $guarded = ['date'];
    const CREATED_AT = 'date';

    public function web()
    {
        return $this->belongsTo(Details::class, 'web_id', 'id');
    }
}
