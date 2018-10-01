<?php

namespace App\Contracts\Repository;


interface Repository
{
    /**
     * Get all of the models from the database.
     *
     * @param array|mixed $columns
     * @return mixed
     */
    public function all($columns = ['*']);

    /**
     * Save a new model and return the instance.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete the model for the given ID.
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id);

    /**
     * Destroy the models for the given ID(s)
     *
     * @param array|mixed $ids
     * @return mixed
     */
    public function destroy($ids);

    /**
     * Find a model by its primary key.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, array $columns = ['*']);

    /**
     * Find multiple models by their primary keys.
     *
     * @param array $ids
     * @param array $columns
     * @return mixed
     */
    public function findMany(array $ids, array $columns = ['*']);

    /**
     * Find a model by its primary key or throw an exception.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, array $columns = ['*']);

    /**
     * Find a model by its primary key or return fresh model instance.
     *
     * @param mixed $id
     * @param array $columns
     * @return mixed
     */
    public function findOrNew($id, array $columns = ['*']);

    /**
     * Get the first record matching the attributes or instantiate it.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function firstOrNew(array $attributes, array $values = []);

    /**
     * Get the first record matching the attributes or create it.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function firstOrCreate(array $attributes, array $values = []);

    /**
     * Create or update a record matching the attributes, and fill it with values.
     *
     * @param array $attributes
     * @param array $values
     * @return mixed
     */
    public function updateOrCreate(array $attributes, array $values = []);
}
