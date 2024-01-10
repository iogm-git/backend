<?php

namespace App\Http\Middleware;

use App\Models\Member;
use Closure;
use Illuminate\Http\Request;

class EmailOtpVerificationMiddleware
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
        $memberId = $request->input('id');

        // Check if the Member with the given ID is already verified
        $isVerified = $this->isMemberVerified($memberId);

        if ($isVerified) {
            // If the Member is already verified, you can handle it as needed
            return response()->json(['error' => 'Member is already verified'], 403);
        }

        // Continue with the request if OTP is valid
        return $next($request);
    }

    private function isMemberVerified($memberId)
    {
        // Check if the 'verification_at' column for the Member with the given ID is not null
        return Member::where('id', $memberId)->whereNotNull('verification_at')->exists();
    }
}
