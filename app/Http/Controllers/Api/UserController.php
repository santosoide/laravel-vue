<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\UserInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserEditRequest;
use App\Domain\Entities\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class UserController extends Controller
{
    /**
     * @var UserInterface
     */
    protected $user;

    /**
     * UserController constructor.
     * @param UserInterface $user
     */
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        return $this->user->paginate(10,  $columns = ['*'], 'name' ,''  );
    }

    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(UserCreateRequest $request){
        return $this->user->store($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        return $this->user->find($id);
    }

    /**
     * @param UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function update(UserEditRequest $request, $id){
       return $this->user->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        return $this->user->delete($id);
    }
}
