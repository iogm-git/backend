<?php

namespace App\Http\Middleware\Custom\Shop;

use App\Models\User\Member;
use Closure;
use Illuminate\Http\Request;

class EmailOtpVerificationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $memberId = $request->input('id');

        if ($memberId === null) {
            // Handle the case when 'id' is not provided in the request
            return response()->json(['error' => 'Member ID is required'], 422);
        }

        // Check if the Member with the given ID is already verified
        $isVerified = $this->isMemberVerified($memberId);

        if (!$isVerified) {
            // If the Member is not verified, you can handle it as needed
            return response()->json(['error' => 'Member is not verified'], 422);
        }

        // Continue with the request if OTP is valid
        return $next($request);
    }

    private function isMemberVerified($memberId)
    {
        // Check if the 'verification_at' column for the Member with the given ID is null
        return is_null(Member::where('id', $memberId)->value('verification_at'));
    }
}
