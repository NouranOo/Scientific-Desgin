<?php
/**
 * Created by PhpStorm.
 * User: mallahsoft
 * Date: 21/10/18
 * Time: 11:01 ص
 */

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuthService
{


    function login($input)
    {
        $jwt_token = null;
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return false;
        }
        return $jwt_token;
    }

    function getAuthUser($token)
    {
        $user = Auth::user();
        return $user;
    }


    function register()
    {

    }
}
