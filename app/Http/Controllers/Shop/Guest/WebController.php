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
        return ResponseApiHelper::customApiResponse(true, Details::paginate(5), 'Data retrieved successfully.');
    }

    public function category()
    {
        return ResponseApiHelper::customApiResponse(true, Details::filter(request(['name']))->get(), 'Data retrieved successfully.');
    }

    public function search()
    {
        return ResponseApiHelper::customApiResponse(true, Details::filter(request(['keyword']))->get(), 'Data retrieved successfully.');
    }

    public function categories()
    {
        $data = Categories::get();

        $categories = [];

        for ($i = 0; $i < $data->count(); $i++) {
            $categories[$i] = $data[$i]->category_name;
        }

        return ResponseApiHelper::customApiResponse(true, $categories, 'Data retrieved successfully.');
    }

    public function show()
    {
        return ResponseApiHelper::customApiResponse(true, Details::whereRelation('web_category', 'name', '=', request('category'))->whereRelation('web_type', 'name', '=', request('type'))->first(), 'Data retrieved successfully.');
    }
}
