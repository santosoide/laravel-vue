<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return User::paginate();
    }

    public function store(UserCreateRequest $request){
        return User::create($request->all());
    }

    public function show($id){
        return User::find($id);
    }

    public function update(UserEditRequest $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function destroy($id){
        $user = User::find($id);
        return $user->delete();
    }
}
