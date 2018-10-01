<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repository\Repository as RepositoryInterface;


abstract class EloquentRepository implements RepositoryInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * EloquentRepository constructor.
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     * @return string
     */
    abstract public function model();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    /**
     * Get all of the models from the database.
     *
     * @param array|mixed $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->all($columns);
    }

    /**
     * Save a new model and return the instance.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }

    /**
     * Update
     * @param mixed $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes)
    {
        $m = $this->find($id);
        if ($m) {
            return $m->update($attributes);
        }
        return false;
    }

    /**
     * Delete the model for the given ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        $m = $this->find($id);
        if ($m) {
            return $m->delete();
        }
        return false;
    }

    /**
     * Destroy the models for the given ID(s).
     *
     * @param array|mixed $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Find a model by its primary key.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    /**
     * Find multiple models by their primary keys.
     *
     * @param array $ids
     * @param array $columns
     * @return mixed
     */
    public function findMany(array $ids, array $columns = ['*'])
    {
        return $this->model->findMany($ids, $columns);
    }

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, array $columns = ['*'])
    {
        return $this->model->findOrFail($id, $columns);
    }

    /**
     * Find a model by its primary key or return fresh model instance.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function findOrNew($id, array $columns = ['*'])
    {
        return $this->model->findOrNew($id, $columns);
    }

    /**
     * Get the first record matching the attributes or instantiate it.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function firstOrNew(array $attributes, array $values = [])
    {
        return $this->model->firstOrNew($attributes, $values);
    }

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $values = [])
    {
        return $this->model->firstOrCreate($attributes, $values);
    }

    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = [])
    {
        return $this->model->updateOrCreate($attributes, $values);
    }
}
