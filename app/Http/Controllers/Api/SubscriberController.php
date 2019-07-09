<?php

namespace App\Http\Controllers\Api;


use App\Domain\Contracts\SubscriberInterface;
use App\Http\Controllers\Controller;

use App\Http\Requests\SubscriberEditRequest;
use Illuminate\Http\Request;
use App\Http\Requests\SubscriberCreateRequest;

/**
 * Class UserController
 * @package App\Http\Controllers\Api
 */
class SubscriberController extends Controller
{
    /**
     * @var RoleInterface
     */
    protected $subscriber;

    /**
     * UserController constructor.
     * @param UserInterface $user
     */
    public function __construct(SubscriberInterface $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->subscriber->paginate(10,  $columns = ['*'], 'email', '');
    }

    /**
     * @param SubscriberCreateRequest $request
     * @return mixed
     */
    public function store(SubscriberCreateRequest $request)
    {
        return $this->subscriber->store($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->subscriber->find($id);
    }

    /**
     * @param UserEditRequest $request
     * @param $id
     * @return mixed
     */
    public function update(SubscriberEditRequest $request, $id)
    {
        return $this->subscriber->update($id, $request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->subscriber->delete($id);
    }
}
