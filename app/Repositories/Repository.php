<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class Repository implements RepositoryInterface
{
    /**
     * Model property on class instances
     */
    protected $model;

    /**
     * Constructor to bind model to repo
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get all instances of model
     *
     * @return collection
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * create a new record in the database
     *
     * @param array$data   The data
     *
     * @return collection
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * update record in the database
     *
     * @param array $data   The data
     * @param int   $id     The identifier
     *
     * @return collection
     */
    public function update(array $data, $id)
    {
        $record = $this->find($id);
        return $record->update($data);
    }

    /**
     * Remove record from the database
     *
     * @param int $id     The identifier
     *
     * @return void
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Show the record with the given id
     *
     * @param int $id     The identifier
     *
     * @return collection
     */
    public function show($id)
    {
        return $this->model-findOrFail($id);
    }

    /**
     * Get the associated model
     *
     * @return Model  The model.
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set the associated model
     *
     * @param Model $model  The model
     *
     * @return Model
     */
    public function setModel($model)
    {
        $this->model = $model;
        return $this;
    }

    /**
     * Eager load database relationships
     *
     * @param Model $relations  The relations
     *
     * @return collection
     */
    public function with($relations)
    {
        return $this->model->with($relations);
    }
}
