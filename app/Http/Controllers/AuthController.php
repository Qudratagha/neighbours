<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
     /**
      * Create a new AuthController instance.
      *
      * @return void
      */
     public function __construct()
     {
         $this->middleware('auth:api', ['except' => ['login','register']]);
     }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
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

    public function register(){
        $validator = validator()->make(request()->all(),[
            'name' => 'string|required',
            'email'=> 'email|required',
            'password' => 'string|min:8',
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => 'Registration Failed'
            ]);
        }

        $user = User::create([
            'name' => request()->get('name'),
            'email' => request()->get('email'),
            'password' => brcypt(request()->get('password'))
        ]);

        return response()->json([
            'message' => 'User Created',
            'user' => $user
        ]);
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
        $role = Auth::user()->roles->pluck('name')->last();
        return response()->json([
            'access_token'  => $token,
            'token_type'    => 'bearer',
            'expires_in'    => config('jwt.ttl'),
            'role'          => $role
        ]);
    }
}
