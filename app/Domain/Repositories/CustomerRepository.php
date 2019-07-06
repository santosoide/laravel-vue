<?php


namespace App\Domain\Repositories;


use App\Domain\Contracts\CustomerInterface;
use App\Domain\Contracts\UserInterface;
use App\Domain\Entities\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomerRepository
 * @package App\Domain\Repositories
 */
final class CustomerRepository extends AbstractRepository implements CustomerInterface
{
    protected $model;

    public function __construct(Customer $customer)
    {
        $this->model = $customer;
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
            'first_name'    => e($data['first_name']),
            'last_name'     => e($data['last_name']),
            'gender'        => e($data['gender']),
            'date_of_birth' => e($data['date_of_birth']),
            'email'         => e($data['email']),
            'password'      => bcrypt($data['password']),
            'notes'         => e($data['notes']),
            'phone'         => e($data['phone']),
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
