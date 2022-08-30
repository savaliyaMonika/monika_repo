<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Validator;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;



class ApiJWTAuthController extends Controller
{
    public $token = true;
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * This method used to register user
     * @return response 
     */
    public function register(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'user_type' => $request->user
            ]);
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'data' => $user,
            ], Response::HTTP_OK);
        }
    }
    /**
     * This method used to login user
     * 
     * @return response with token 
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validator   = Validator::make($credentials, [
            'email'    => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()
                ->json([
                    'code'    => 1,
                    'massage' => 'validator failed',
                    'errors'  => $validator->errors()
                ], 422);
        }
        $jwt_token = null;

        if (!$jwt_token = JWTAuth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_UNAUTHORIZED);
        }
        User::where('email', $request->email)
            ->update([
                'api_token' => $jwt_token
            ]);
        return response()->json([
            'success' => true,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        } else {
            try {
                JWTAuth::invalidate($request->token);

                return response()->json([
                    'success' => true,
                    'message' => 'User has been logged out'
                ]);
            } catch (JWTException $exception) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, user cannot be logged out'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function getUser(Request $request){
       $user =  User::all(); 
       if (!$user) {
           return response()->json([
               'success' => false,
               'message' => 'Sorry, User not found.'
           ], 400);
       }
       return $user;
    }
    public function show($id)
    {
        $user =  User::find($id);
    
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user not found.'
            ], 400);
        }
    
        return $user;
    }

}
