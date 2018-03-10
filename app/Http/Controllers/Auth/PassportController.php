<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 10/02/18
 * Time: 14:47
 */

namespace App\Http\Controllers\Auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\User\User;

class PassportController extends Controller
{
    private $policies = [
        'first_name'   =>  'required',
        'last_name'    =>  'required',
        'phone'        =>  'required|numeric|unique:users',
        'email'        =>  'required|email|unique:users',
        'password'     =>  'required',
        'c_password'   =>  'required|same:password',
    ];
    /**
     * login api
     *
     * @return Response
     */

    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('realestate')->accessToken;
            return response()->json(['success' => $success], 200);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    /**
     * Register api
     *
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), $this->policies);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('realestate')->accessToken;
        $success['email'] =  $user->email;
        $success['phone'] =  $user->phone;

        return response()->json(['success'=>$success], 200);
    }


    /**
     * details api
     *
     * @return Response
     */
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }
}