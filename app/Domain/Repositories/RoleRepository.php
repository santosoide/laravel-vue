<?php


namespace App\Domain\Repositories;


use App\Domain\Contracts\RoleInterface;
use App\Domain\Entities\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserRepository
 * @package App\Domain\Repositories
 */
final class RoleRepository extends AbstractRepository implements RoleInterface
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
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
            'name'                  => e($data['name']),
            'permission_type'       => e($data['permission_type']),
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
