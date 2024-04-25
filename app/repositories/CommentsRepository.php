<?php

namespace App\Repositories;

use App\Models\Comments;

/**
 * CommentRepository is used for writing complex SQL queries
 * and implementing actions related to database operations.
 * It extends the Repository abstract class to inherit model actions.
 */
class CommentsRepository extends Repository
{   
    /**
     * Initialize the comments model to utilize 
     * the ORM Model actions.
     */
    public function __construct()
    {
        $this->model = new Comments();
    }
}