<?php

namespace App\Libs\Interfaces;

/**
 * This interface serves as a blueprint for interacting with the database,
 * allowing for the addition of more database drivers in the future.
 */
interface DatabaseInterface
{
    /**
	 * Returns the instance of the database driver.
	 */
    public function getInstance();
    
    /**
     * Returns the collection of model
     */
    public function select(string $sql);

    /**
     * Returns the query result
     */
    public function exec(string $sql);

    /**
     * Returns the last inserted id
     */
    public function lastInsertId();

    /**
     * Begin the transaction in CRUD operations
     */
    public function beginTransaction();

    /**
     * Commit the transaction 
     * when no error occurs in CRUD operations
     */
    public function commit();

    /**
     * Rollback the transaction
     * when error occurs during CRUD operations
     */
    public function rollback();
}