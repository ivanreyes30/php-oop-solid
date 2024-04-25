<?php


/**
 * Requiring the autoload.php
 * To auto load the application classes
 */
require __DIR__. '/vendor/autoload.php';

/**
 * Importing Services and Dotenv Library.
 */
use App\Services\{NewsManagerService, CommentsManagerService};
use Dotenv\Dotenv;

/**
 * Initialize the Dotenv library in first load of the request.
 */
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();


/**
 * Initialize the Services and actions.
 */
$newsService = new NewsManagerService();
$commentService = new CommentsManagerService();
$listNews = $newsService->listNews();
$listComments = $commentService->listComments();


/**
 * Display the News and Comments.
 */
foreach ($listNews as $news) {
    echo("############ NEWS " . $news->title . " ############\n");
	echo($news->body . "\n");
    foreach ($listComments as $comment) {
        if ($comment->news_id != $news->id) continue;
        echo("Comment " . $comment->id . " : " . $comment->body . "\n");
    }
}