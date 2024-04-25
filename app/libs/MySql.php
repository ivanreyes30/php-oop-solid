<?php

namespace App\Libs;

use \PDO;
use App\Config\Database;
use App\Libs\Interfaces\DatabaseInterface;

/**
 * This class represents the MySQL Driver implementation
 * for use with the DB Helper.
 */
class MySql implements DatabaseInterface
{
	/**
	 * Holds the single instance of the PDO
	 * for implementing the singleton pattern.
	 */
    private static $pdo;

	/**
	 * Holds the single instance of the PDO
	 * for implementing the singleton pattern.
	 */
	private static $instance = null;

	/**
	 * Returns PDO instance.
	 */
	protected function pdoInstance()
	{
		if (static::$pdo) return static::$pdo;
		$dsn = Database::DB_CONNECTION(). ':dbname='. Database::DB_DATABASE(). ';host='. Database::DB_HOST();
		static::$pdo = new \PDO($dsn, Database::DB_USER(), Database::DB_PASSWORD());
		
		return static::$pdo;
	}

	/**
	 * Returns the instance of the database driver.
	 */
	public function getInstance()
	{
		if (null === static::$instance) {
			$c = __CLASS__;
			static::$instance = new $c;
		}
		return static::$instance;
	}

	/**
     * Returns the collection of model
     */
	public function select($sql)
	{
		$sth = static::pdoInstance()->query($sql);
		return $sth->fetchALL(PDO::FETCH_ASSOC);
	}

	/**
     * Returns the query result
     */
	public function exec($sql)
	{
		return static::pdoInstance()->exec($sql);
	}

	/**
     * Returns the last inserted id
     */
	public function lastInsertId()
	{
		return static::pdoInstance()->lastInsertId();
	}

	/**
     * Begin the transaction in CRUD operations
     */
	public function beginTransaction()
	{
		return static::pdoInstance()->beginTransaction();
	}

	/**
     * Commit the transaction 
     * when no error occurs in CRUD operations
     */
	public function commit()
	{
		return static::pdoInstance()->commit();
	}

	/**
     * Rollback the transaction
     * when error occurs during CRUD operations
     */
	public function rollback()
	{
		return static::pdoInstance()->rollback();
	}
}