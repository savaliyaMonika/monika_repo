<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use App\Transformers\UserTransformer;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class MyController extends Controller
{
    use Helpers;
    public function getUsers(Request $request)
    {
        $user =  User::all();
        return $this->response->collection($user, new UserTransformer);
    }
}
