<?php

namespace App\Libs;

use App\Libs\Interfaces\DatabaseInterface;

/**
 * This class utilizes DB Helpers 
 * to facilitate easy access to database actions.
 */
class DB
{	
	/**
	 * Holds the single instance of the class
	 * for implementing the singleton pattern.
	 */
	protected static $instance;

	/**
	 * Initializes the DB Helper
	 * with MySQL as the default database.
	 */
	public function __construct(?DatabaseInterface $database = null)
	{
		static::$instance = $database ?? new MySql();
	}

	/**
	 * Returns the instance of the database driver.
	 */
    public static function getInstance()
    {
		if (static::$instance) return self::$instance;
		return (new static)->getInstance();
    }

	/**
     * Returns the collection of model
     */
	public static function select($sql)
	{
		return static::getInstance()->select($sql);
	}

	/**
     * Returns the query result
     */
	public static function exec($sql)
	{
		return static::getInstance()->exec($sql);
	}

	/**
     * Returns the last inserted id
     */
	public static function lastInsertId()
	{
		return static::getInstance()->lastInsertId();
	}

	/**
     * Begin the transaction in CRUD operations
     */
	public static function beginTransaction()
	{
		return static::getInstance()->beginTransaction();
	}

	/**
     * Commit the transaction 
     * when no error occurs in CRUD operations
     */
	public static function commit()
	{
		return static::getInstance()->commit();
	}

	/**
     * Rollback the transaction
     * when error occurs during CRUD operations
     */
	public static function rollback()
	{
		return static::getInstance()->rollback();
	}
}