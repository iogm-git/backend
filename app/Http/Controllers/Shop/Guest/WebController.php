<?php

namespace App\Http\Controllers\Shop\Guest;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Shop\Web\Categories;
use App\Models\Shop\Web\Details;

class WebController extends Controller
{
    public function details()
    {
        $data = Details::paginate(5);
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function category()
    {
        $data = Details::filter(request(['name']))->get();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function search()
    {
        $data = Details::filter(request(['keyword']))->get();
        return ResponseApiHelper::customApiResponse(true, $data);
    }

    public function categories()
    {
        $data = Categories::get();

        $categories = [];

        for ($i = 0; $i < $data->count(); $i++) {
            $categories[$i] = $data[$i]->name;
        }

        return ResponseApiHelper::customApiResponse(true, $categories);
    }

    public function show()
    {
        $data = Details::whereRelation('web_category', 'name', '=', request('category'))
            ->whereRelation('web_type', 'name', '=', request('type'))->first();
        return ResponseApiHelper::customApiResponse(true, $data);
    }
}
