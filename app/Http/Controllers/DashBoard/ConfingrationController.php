<?php

namespace App\Http\Controllers\DashBoard;
use App\Http\Controllers\APIResponseTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\{User,Configration};
use Auth ,File;

class ConfingrationController extends CRUDController
{
     use APIResponseTrait;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function login (Request $request) {

        $validator = Validator::make($request->all(), [
            'user_name' => 'required|string|max:255',
            'password' => 'required|string',
        ]);
        if ($validator->fails())
        {
          
            return  $this->APIResponse(null, $validator->errors(), 422); 
        }

        $field = 'phone';

        if (is_numeric( request('user_name'))) {
            $field = 'phone';
        } elseif (filter_var( request('user_name'), FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        }
        else
        {
            $field = 'user_name';
        }
        $request->merge([$field => request('user_name')]);

    
        $user = User::where($field, request('user_name'))->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
            
                // $success['token'] = $user->createToken('token')->accessToken;
                $success['user_name'] = $user->user_name;
                $success['user_id'] = $user->id;
                return $this->APIResponse($success, null, 200);
            } else {
                return $this->APIResponse(null, "كلمة المرور غير مطابقة", 422);  
            }
        } else {
            return $this->APIResponse(null, "هذا المستخدم لا يوجد", 422);
        }
    }

    public function showProfile($id=null)
    {
        // if (!Auth::guard('api')->check()) {
        //     return $this->APIResponse(null, "the token is expired", 422);
        // }
        // return $this->APIResponse(Auth::guard('api')->user(), null, 200);
        $user = User::find($id);
        if(isset($user)){
            return $this->APIResponse($user, null, 200);
        }
        return $this->APIResponse(null, "this account not found", 404);
    }
    public function updateProfile(Request $request , $id = null){
        
        // if (isset($request->validator) && $request->validator->fails())
        // {
        //     return $this->APIResponse(null , $request->validator->messages() ,  422);
        // }
        // if (Auth::guard('api')->check()) {
        //     $row = $this->model->Find(Auth::guard('api')->user()->id);
        // }
        // else
        // {
        //     return $this->APIResponse(null, "the token is expired", 422);
        // }
       $row=User::Find($id);
        if(!isset($row)){
            return $this->APIResponse(null, "this account not found or deleted", 404);
        }
        $requestArray = $request->all();
        if(isset($requestArray['password']) && $requestArray['password'] != ""){
            $requestArray['password'] =  Hash::make($requestArray['password']);
        }else{
            unset($requestArray['password']);
        }
        // if(isset($requestArray['image']) )
        // {
        //     $fileName = $this->storeFile($request->image  );
        //     $requestArray['image'] =  $fileName;
        // }
        
        // $requestArray['user_id'] = Auth::user()->id;
        $row->update($requestArray);
        return $this->APIResponse(null, null, 200);
    }


    public function logout()
    { 
        // if (Auth::guard('api')->check()) {
        //     Auth::guard('api')->user()->AauthAcessToken()->delete();
        //     return $this->APIResponse(null, null, 200);
        // }
        // else
        // {
        //     return $this->APIResponse(null, "the token is expired", 422);
        // }
        return $this->APIResponse(null, null, 200);
    }

    public function getConfigration()
    {
        $configration = Configration::find(1);
        return $this->APIResponse($configration, null, 200);
    }

    public function updateConfigration(Request $request)
    {
        $configration = Configration::find(1);
        $configration->update($request->all());
        return $this->APIResponse(null, null, 200);
    }

    public function uploadFile(Request $request)
    {
        // $path = 'uploads/'.$folderName.'/'.date("Y-m-d");
        $path = 'uploads/'.date("Y-m-d");
        if(!File::isDirectory($path))
        {
            File::makeDirectory($path, 0777, true, true);
        }
        $file = $request->image;
        $name = time().'.'.$file->getClientOriginalExtension();
        $file->move($path, $name);
        return $this->APIResponse(['path'=>asset($path .'/'. $name)], null, 200);
        return asset($path .'/'. $name);
    }
}
