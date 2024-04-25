<?php

namespace App\Models;

use App\Libs\DB;

/**
 * Abstract Class Model is intended for extension only
 * and cannot be initialized directly from other classes.
 * This model is designed for utilizing the ORM from scratch.
 */
abstract class Model
{
    /**
     * Returns the table name.
     */
    protected $table;

    /**
     * Returns the DB instance.
     */
    protected $db;

    /**
	 * Returns the column names and values.
	 */
    protected $attributes;

    /**
     * Initialize the DB Instance in first load.
     */
    public function __construct()
    {
        $this->db = new DB();
    }

    /**
     * Returns the value of the given column name.
     */
    public function __get($name)
	{
		return $this->attributes[$name];
	}

    /**
     * Sets the value of the given column name.
     */
	public function __set($name, $value)
	{
		$this->attributes[$name] = $value;
	}

    /**
     * Insert new data into the database.
     */
    public static function create(array $request)
    {
        if (empty($request)) return null;
        $columns = implode(', ', array_keys($request));
        $values = '"' . implode('", "', $request) . '"';
        $table = (new static)->table;

        $query = "INSERT INTO {$table} ($columns) VALUES (" . $values . ")";
        DB::exec($query);
        
        return (int) DB::lastInsertId();
    }

    /**
     * Retrieve all data from the database.
     */
    public static function all()
    {
        $table = (new static)->table;
        $data = DB::select("SELECT * FROM `{$table}`");

        if (empty($data)) return [];

        return array_map(function ($row) {
            $model = new static();
            foreach ($row as $key => $value) {
                $model->$key = $value;
            }
            return $model;
        }, $data);
    }

    /**
     * Delete data from the database based on a specific column value.
     */
    public static function deleteByColumn(int $id, string $column)
    {
        if (empty($id)) return false;
        $table = (new static)->table;

        $query = "DELETE FROM {$table} WHERE $column = $id";
        $result = DB::exec($query);
        
        return !!$result;
    }

    /**
     * Delete data by id from the database.
     */
    public static function delete(int $id = null)
    {
        if (empty($id)) return false;
        $table = (new static)->table;

        $query = "DELETE FROM {$table} WHERE id = $id";
        $result = DB::exec($query);

        return !!$result;
    }
}