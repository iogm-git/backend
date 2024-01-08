<?php

namespace App\Models\Shop\Member;

use App\Models\Member;
use App\Models\Shop\Web\Details;
use Illuminate\Database\Eloquent\Model;

class Stash extends Model
{
    public $timestamps = false;
    protected $table = 'member_stash';
    protected $with = ['web', 'member'];
    protected $guarded = [''];

    public function web()
    {
        return $this->belongsTo(Details::class, 'web_id', 'id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
