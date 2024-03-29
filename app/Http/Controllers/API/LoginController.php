<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    // 登录
    public function signIn() {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $res = [];
            $res['token'] = $user->createToken('MyApp')->accessToken;
            var_dump($res);exit;
            $res['userinfo']['name'] = $user->name;
            $res['userinfo']['email'] = $user->email;
            return response()->json($res, 200);
        }else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    // 注册
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);           
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json([$success, 'message'=>'注册成功'], 200);
    }

    // 测试auth认证
    public function getDetails()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], 200);
    }

    // 测试
    public function getTest() {
        $users = DB::select('select * from users');
        return $users;
        // return 'test success';
    }
}
