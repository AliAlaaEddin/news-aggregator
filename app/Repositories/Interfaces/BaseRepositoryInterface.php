<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface {

    public function all();

    public function count();

    public function create(array $data);

    public function createMultiple(array $data);

    public function delete();

    public function deleteById($id);

    public function deleteMultipleById(array $ids);

    public function first();

    public function get();

    public function getById($id);

    public function limit($limit);

    public function orderBy(string $column,string $direction);

    public function updateById(string $id, array $data);

    public function where(string $column,string $value,string $operator = '=');

    public function whereIn(string $column, $value);

    public function with($relations);
}
