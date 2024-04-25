<?php

namespace App\Services;

use App\Libs\DB;
use App\Repositories\{NewsRepository, CommentsRepository};
use Exception;

/**
 * NewsManagerService is used for implementing complex business logic.
 * It extends the Service abstract class to inherit helper methods
 * specific to the service layer.
 */
class NewsManagerService extends Service
{
	/**
	 * Returns the CommentRepository instance.
	 */
	protected $commentsRepository;

	/**
	 * Initialize the CommentRepository & NewsRepository.
	 */
	public function __construct()
	{
		$this->repository = new NewsRepository();
		$this->commentsRepository = new CommentsRepository();
	}

	/**
	 * Returns a list of news.
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 */
	public function listNews()
	{
		try {
			return $this->repository->all();
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Create news article.
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 */
	public function addNews(array $request)
	{
		try {
			return $this->repository->create($request);
		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * Delete news article.
	 * Includes a try-catch block to handle errors that may occur during runtime.
	 * Implement transactions for multiple table CRUD Operations.
	 */
	public function deleteNews(int $id)
	{
		DB::beginTransaction();

		try {
			$this->commentsRepository->deleteByColumn($id, 'news_id');
			$this->repository->delete($id);
			DB::commit();
			return true;
		} catch (Exception $e) {
			DB::rollback();
			return false;
		}
	}
}