<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use illuminate\Http\JsonResponse;

class RegisterController extends BaseController
{
    public function register(Request $request ):JsonResponse
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required:email',
            'password'=>'required',
            'c_password'=>'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validate Error',$validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        
    }
}
