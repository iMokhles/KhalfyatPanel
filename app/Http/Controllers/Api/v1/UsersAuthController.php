<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 25/10/2018
 * Time: 22:39
 */

namespace App\Http\Controllers\Api\v1;


use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class UsersAuthController extends Controller
{


    /**
     * UsersAuthController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);

    }


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('api')->attempt($credentials)) {
            return ApiHelper::sendResponse(Response::$statusTexts[Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);
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
        if (auth('api')->check()) {
            return ApiHelper::sendResponse(auth('api')->user(), Response::HTTP_OK);
        }
        return ApiHelper::sendResponse(Response::$statusTexts[Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);

    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('api')->logout();

        return ApiHelper::sendResponse('Successfully logged out', Response::HTTP_OK);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        try {
            $user = auth('api')->userOrFail();
            if ($user) {
                return $this->respondWithToken(auth('api')->refresh());
            }
            return ApiHelper::sendResponse(Response::$statusTexts[Response::HTTP_UNAUTHORIZED], Response::HTTP_UNAUTHORIZED);

        } catch (UserNotDefinedException $e) {
            return ApiHelper::sendResponse($e->getMessage(), Response::HTTP_UNAUTHORIZED);
        }
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
        return ApiHelper::sendResponse([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ], Response::HTTP_OK);
    }
}