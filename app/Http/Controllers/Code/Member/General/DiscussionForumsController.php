<?php

namespace App\Http\Controllers\Code\Member\General;

use App\Helpers\ResponseApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Code\General\DiscussionForums;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DiscussionForumsController extends Controller
{
    public function getData()
    {
        return ResponseApiHelper::customApiResponse(true, DiscussionForums::where('course_id', request('course_id'))->orderBy('created_at')->limit(10)->get(), 'Data retrieved successfully.');
    }

    public function store()
    {
        $validator = Validator::make(['message' => request('message')], [
            'message' => 'required|no_bad_words|string|min:5'
        ]);

        if ($validator->fails()) {
            return ResponseApiHelper::customApiResponse(false, null, null, $validator->errors());
        }

        $success = DiscussionForums::create([
            'course_id' => request('course_id'),
            'user_id' => request('user_id'),
            'message' => request('message')
        ]);

        return ResponseApiHelper::customApiResponse($success, null, 'Data successfully added to the database.', 'Failed to add data to the database.');
    }

    public function getCategories()
    {
        return ResponseApiHelper::customApiResponse(true, DB::connection('pgsql')
            ->table('discussion_forums')
            ->select(DB::raw('DISTINCT course_id'))
            ->get(), 'Data retrieved successfully.');
    }
}
