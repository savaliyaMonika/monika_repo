<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use App\Transformers\UserTransformer;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class MyController extends Controller
{
    public function getUsers(Request $request)
    {
        $user =  User::all();
        return $user;
    }
}
