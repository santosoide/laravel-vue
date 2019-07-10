<?php 

namespace App\Domain\Repositories;

use App\Domain\Contracts\CategoryInterface;
use App\Domain\Entities\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;
/**
 * Class CategoryRepository
 * @package App\Domain\Repositories
 */
final class CategoryRepository extends AbstractRepository implements CategoryInterface
{
    protected $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
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
            'position'    => e($data['position']),
            'image'     => e($data['image']),
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