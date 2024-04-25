<?php

namespace App\Services;

use App\Repositories\CommentsRepository;
use Exception;

/**
 * CommentsManagerService is used for implementing complex business logic.
 * It extends the Service abstract class to inherit helper methods
 * specific to the service layer.
 */
class CommentsManagerService extends Service
{	
	/**
	 * Initialize the CommentRepository
	 */
	public function __construct()
	{
		$this->repository = new CommentsRepository();
	}

	/**
	 * Returns the list of comments
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 */
	public function listComments()
	{
		try {
			return $this->repository->all();
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Create comments for news articles.
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 */
	public function addCommentForNews(array $request)
	{
		try {
			return $this->repository->create($request);
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Deletes a comment from the news articles.
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 */
	public function deleteComment(int $id)
	{
		try {
			return $this->repository->delete($id);
		} catch (Exception $e) {
			return false;
		}
	}
}