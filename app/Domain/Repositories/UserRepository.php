<?php


namespace App\Domain\Repositories;


use App\Domain\Contracts\UserInterface;
use App\Domain\Entities\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserRepository
 * @package App\Domain\Repositories
 */
final class UserRepository extends AbstractRepository implements UserInterface
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    /**
     * @param int $limit
     * @param array $columns
     * @param string $key
     * @param string $value
     * @return Paginator|mixed
     */
    public function paginate($limit, array $columns , $key, $value)
    {
        return parent::paginate($limit, $columns, $key, $value);
    }

    /**
     * @param array $data
     * @return mixed|Response
     */
    public function store(array $data)
    {
        return parent::create([
            'name'     => e($data['name']),
            'email'    => e($data['email']),
            'password' => e($data['password']),
        ]);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed|Response
     */
    public function update($id, array $data)
    {
        return parent::update($id, $data);
    }

    /**
     * @param int $id
     * @param array $columns
     * @return Model|mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return parent::find($id, $columns);
    }

    /**
     * @param $id
     * @return mixed|Response
     * @throws \Exception
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

}
