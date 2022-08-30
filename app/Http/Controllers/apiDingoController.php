<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use App\Transformers\UserTransformer;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Validator;

class apiDingoController extends Controller
{
    use Helpers;

    public function index()
    {
        $user =  User::all();
        return $this->response->array(['data' => $user], 200);
    }
    public function show($id)
    {
        $user =  User::findOrFail($id);
        if ($user) {
            return $this->item($user, new UserTransformer, ['key' => 'user']);
        }
        return $this->response->errorNotFound();
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        JWTAuth::invalidate($request->input('token'));
    }
    public function getUsers(Request $request)
    {
        $user =  User::all();
        return $this->response->collection($user, new UserTransformer);
    }
}
