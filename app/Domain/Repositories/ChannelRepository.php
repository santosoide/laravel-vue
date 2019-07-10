<?php


namespace App\Domain\Repositories;


use App\Domain\Contracts\ChannelInterface;
use App\Domain\Contracts\UserInterface;
use App\Domain\Entities\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CustomerRepository
 * @package App\Domain\Repositories
 */
final class ChannelRepository extends AbstractRepository implements ChannelInterface
{
    protected $model;

    public function __construct(Channel $channel)
    {
        $this->model = $channel;
    }

    /**
     * @param int $limit
     * @param array $columns
     * @param string $key
     * @param string $value
     * @return Paginator|mixed
     */
    public function paginate($limit, array $columns, $key, $value)
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
            'code'    => e($data['code']),
            'name'     => e($data['name']),
            'description'        => e($data['description']),
            'timezone' => e($data['timezone']),
            'theme'         => e($data['theme']),
            'hostname'      => e($data['hostname']),
            'logo'         => e($data['logo']),
            'favicon'         => e($data['favicon']),
            'home_page_content' => e($data['home_page_content']),
            'footer_content' => e($data['footer_content']),

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
