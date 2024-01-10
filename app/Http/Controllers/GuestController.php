<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class GuestController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'google']]);
    }

    public function google()
    {
        $member = Member::where('username', '=', request('username'));

        if (!$member->exists()) {
            Member::create([
                'id' => request('id'),
                'username' => request('username'),
                'member_password' => Hash::make('member_password'),
                'name' => request('name'),
                'email' => request('email'),
                'verification_at' => now(),
                'image' => request('image'),
            ]);
            $credentials = [
                'id' => request('id'),
                'password' => 'password'
            ];
        } else {
            $credentials = [
                'username' => $member->first()->username,
                'password' => 'password'
            ];
        }

        if (!$token = auth()->attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect username or password.',
            ], 422);
        }

        return $this->respondWithToken($token);
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required|string|between:5,30|regex:/^[^\s]+$/|unique:member_data,username',
            'password' => ['required', 'confirmed', Password::min(6)->mixedCase()->letters()->numbers()->symbols()]
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validated = $validator->validated();

        Member::create([
            'id' => Str::uuid(),
            'username' => $validated['username'],
            'member_password' => Hash::make($validated['password'])
        ]);

        return response()->json([
            'message' => 'Successfully registered',
        ], 200);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        };

        $validated = $validator->validated();

        $credentials = [
            'username' => $validated['username'],
            'password' => $validated['password']
        ];

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Incorrect username or password'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
