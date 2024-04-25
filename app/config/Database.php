<?php

namespace App\Config;

/**
 * This class only use for related database 
 * .env variables 
 */
class Database
{
    /**
     * Returns the value DB_CONNECTION from the .env variables
     */
    public static function DB_CONNECTION()
    {
        return $_ENV['DB_CONNECTION'] ?? null;
    }

    /**
     * Returns the value DB_HOST from the .env variables
     */
    public static function DB_HOST()
    {
        return $_ENV['DB_HOST'] ?? null;
    }

    /**
     * Returns the value DB_USER from the env variables
     */
    public static function DB_USER()
    {
        return $_ENV['DB_USER'] ?? null;
    }

    /**
     * Returns the value DB_PASSWORD from the env variables
     */
    public static function DB_PASSWORD()
    {
        return $_ENV['DB_PASSWORD'] ?? null;
    }

    /**
     * Returns the value DB_DATABASE from the env variables
     */
    public static function DB_DATABASE()
    {
        return $_ENV['DB_DATABASE'] ?? null;
    }
}