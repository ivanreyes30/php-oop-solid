<?php

namespace App\Repositories;

use App\Models\News;

/**
 * NewsRepository is used for writing complex SQL queries
 * and implementing actions related to database operations.
 * It extends the Repository abstract class to inherit model actions.
 */
class NewsRepository extends Repository
{
    /**
     * Initialize the news model to utilize 
     * the ORM Model actions.
     */
    public function __construct()
    {
        $this->model = new News();
    }
}