<?php

namespace App\Http\Middleware\Code\Student;

use App\Helpers\ResponseApiHelper;
use App\Models\Code\Student\Transactions;
use Closure;
use Illuminate\Http\Request;

class CheckPaidStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $studentId = $request->input('student_id'); // Adjust this according to your route parameter
        $courseId = $request->input('course_id');

        // Perform a check if the student's transactions have a status of "paid"
        $transactions = Transactions::where('student_id', $studentId)
            ->whereIn('course_id', $courseId)
            ->where('status', 'settlement')
            ->get();

        if ($transactions->isEmpty()) {
            // If no paid transactions, return a JSON response
            return ResponseApiHelper::customApiResponse(false, null, null, 'Student hasn\'t paid yet.');
        }

        return $next($request);
    }
}
