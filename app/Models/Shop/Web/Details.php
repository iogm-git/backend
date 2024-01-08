<?php

namespace App\Models\Shop\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    use HasFactory;
    protected $table = 'web_details';
    protected $keyType = 'string';
    protected $with = ['web_category', 'web_type'];
    public $incrementing = false;
    public $timestamps = false;


    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['keyword'] ?? false,
            fn ($query, $search) => $query->where('id', 'like', '%' . $search . '%')
                ->orWhereHas('web_category', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('web_type', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
        );

        $query->when(
            $filters['name'] ?? false,
            fn ($query, $search) => $query->whereHas('web_category', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
        );
    }

    public function web_category()
    {
        return $this->belongsTo(Categories::class, 'category', 'id');
    }

    public function web_type()
    {
        return $this->belongsTo(Types::class, 'type', 'id');
    }
}
