<?php

namespace App\Models;

/**
 * Initializes the News Model,
 * extending the Model ORM to utilize model actions.
 */
class News extends Model
{
	/**
	 * Set the table name.
	 */
	protected $table = 'news';

	/**
	 * Set the column names and values.
	 */
	protected $attributes = [
		'id' => null,
		'title' => null,
		'body' => null,
		'created_at' => null,
	];
}