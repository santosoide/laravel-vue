<?php

namespace App\Http\Controllers\Api;

use App\Domain\Contracts\RoleInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleCreateRequest;
use App\Http\Requests\RoleEditRequest;
use App\Domain\Entities\Role;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class RoleController extends Controller
{
    /**
     * @var RoleInterface
     */
    protected $role;

    /**
     * UserController constructor.
     * @param UserInterface $user
     */
    public function __construct(RoleInterface $role)
    {
        $this->role = $role;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request){
        return $this->role->paginate(10,  $columns = ['*'], 'name' ,''  );
    }

    /**
     * @param UserCreateRequest $request
     * @return mixed
     */
    public function store(RoleCreateRequest $request){
        return $this->role->store($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        return $this->role->find($id);
    }

    /**
     * @param UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function update(RoleEditRequest $request, $id){
       return $this->role->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id){
        return $this->role->delete($id);
    }
}
