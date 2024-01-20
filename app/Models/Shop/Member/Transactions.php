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

    protected $casts = [
        'date' => 'datetime:d M Y',
    ];

    public function getAmountAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }

    public function web()
    {
        return $this->belongsTo(Details::class, 'web_id', 'id');
    }
}
