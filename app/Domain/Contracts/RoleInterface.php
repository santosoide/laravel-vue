<?php


namespace App\Domain\Contracts;


/**
 * Interface UserInterface
 * @package App\Domain\Contracts
 */
interface RoleInterface
{
    /**
     * @param int $limit
     * @param array $columns
     * @param $key
     * @param string $value
     * @return mixed
     */
    public function paginate($limit, array $columns, $key, $value);

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array  $data);

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

}
