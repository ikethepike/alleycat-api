<?php

namespace AlleyCat\Http\Controllers;

use Hash;
use Storage;
use AlleyCat\User;
use Illuminate\Http\Request;
use AlleyCat\Http\Requests\User\LoginRequest;
use AlleyCat\Http\Requests\User\RegisterRequest;

class UserController extends Controller
{
    /**
     * Global token name.
     *
     * @var string
     */
    private $tokenName;

    /**
     * Bind up token name.
     */
    public function __construct()
    {
        $this->tokenName = env('TOKEN_NAME');
    }

    /**
     * Check whether a user exists.
     *
     * @param Illuminate\Http\Request
     *
     * @return int
     */
    public function exists(Request $request)
    {
        return (int) User::where('id', $request->id)->exists();
    }

    /**
     * Register a user and return access token.
     *
     * @param AlleyCat\Http\Requests\User\RegisterRequest $request
     *
     * @return JSON
     */
    public function register(RegisterRequest $request)
    {
        $register             = $request->all();
        $register['password'] = Hash::make($request->password);

        $user = User::create($register);

        return response()->json([
            'user'  => $user,
            'token' => $this->createAccessToken($user),
        ]);
    }

    /**
     * Log a user in.
     *
     * @param AlleyCat\Http\Requests\User\LoginRequest
     *
     * @return JSON
     */
    public function login(LoginRequest $request)
    {
        if (auth()->attempt($request->all())) {
            $user = auth()->user();

            return response()->json([
                'user'  => $user,
                'token' => $this->createAccessToken($user),
            ]);
        }

        return abort(401);
    }

    /**
     * Create a custom access token for a given user.
     *
     * @param AlleyCat\User;
     *
     * @return string
     */
    private function createAccessToken($user)
    {
        return $user->createToken($this->tokenName)->accessToken;
    }

    /**
     * Uploads avatar to storage.
     *
     * @param Request $request
     *
     * @return AlleyCat\User
     */
    public function setAvatar(Request $request)
    {
        $url = Storage::putFile('avatars', $request->file('avatar'));
        if (!$url) {
            return abort(500, 'S3 Upload issue');
        }

        $user         = $request->user();
        $user->avatar = $url;
        $user->save();

        return $user;
    }
}
