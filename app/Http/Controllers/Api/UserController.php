<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Domain\Entities\User;
use Illuminate\Http\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){
        return User::paginate();
    }

    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(UserCreateRequest $request){
        return User::create($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        return User::find($id);
    }

    /**
     * @param UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserEditRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id){
        $user = User::find($id);
        $result = $user->delete();
        if($result){
            return response()->json(['message' =>'Data deleted!'], 200);
        }

        return response()->json(['message' =>'something wrong'], 500);
    }
}
