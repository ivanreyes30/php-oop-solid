<?php

namespace App\Models;

/**
 * Initializes the Comments Model,
 * extending the Model ORM to utilize model actions.
 */
class Comments extends Model
{
	/**
	 * Set the table name.
	 */
	protected $table = 'comment';

	/**
	 * Set the column names and values.
	 */
	protected $attributes = [
		'id' => null,
		'body' => null,
		'created_at' => null,
		'news_id' => null,
	];
}