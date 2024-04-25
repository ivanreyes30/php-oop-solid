<?php

namespace App\Repositories;

/**
 * The Repository abstract class is intended for extension only
 * and cannot be instantiated directly from other classes.
 * This repository is designed for utilizing model actions,
 * and you can create method helpers related to repository functionality.
 * Ex functions: (Update, Database Relationship Mapping, etc..).
 */
abstract class Repository
{
    /**
     * Returns the model instance within the class.
     */
    protected $model;

    /**
     * Returns the model instance from other classes.
     */
    public function model()
    {
        return $this->model;
    }

    /**
     * Retrieve all data from the model.
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * Insert new data into the specific model database.
     */
    public function create(array $request)
    {
        return $this->model->create($request);
    }

    /**
     * Delete data from the specific model database 
     * based on a specific column value.
     */
    public function deleteByColumn(int $id, string $column)
    {
        return $this->model->deleteByColumn($id, $column);
    }

    /**
     * Delete data by id from the specific 
     * model database.
     */
    public function delete(int $id)
    {
        return $this->model->delete($id);
    }
}