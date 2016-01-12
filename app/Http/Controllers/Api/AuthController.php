<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use Illuminate\Validation\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{
    /**
     * API Login, on success return JWT Auth token
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        // all good so return the token
        return response()->json(compact('token'));
    }


    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {

        $this->validate($request, [
            'token' => 'required'
        ]);

        JWTAuth::invalidate($request->input('token'));

        return json_encode("success");
    }

    /**
     * API register
     * @param Request $request
     */
    public function register(Request $request) {
        $input = $request->all();

        $rules = [
            'name' => 'required|max:60',
            'email' => 'required|unique:users,email|email|max:40',
            'password' => 'required|max:20',
            'city' => 'required|max:30',
            'country' => 'required|max:30',
            'gender' => 'required|max:30',
            'birth_date' => 'required|date_format:Y-m-d',
        ];

        $messages = [
            'required' => 'The :attribute field is required.',
            'email.email' => 'Wrong email format',
            'name.unique' => 'Given name is not unique',
            'birth_date.date_format' => 'Date not in correct format',
        ];

        $validator = Validator::make($input, $rules, $messages);

        if($validator->fails()){
            $messages = $validator->errors();
            $return_msg = array();
            foreach ($messages->all() as $message) {
                array_push($return_msg,$message);
            }
            return $return_msg;
        }

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->city = $request->input('city');
        $user->country = $request->input('country');
        $user->gender = $request->input('gender');
        $user->birth_date = (date('Y-m-d',strtotime(($request->input('birth_date')))));
        $user->save();

        return json_encode("success");
    }
}
