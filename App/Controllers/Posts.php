<?php

namespace App\Controllers;

use \Core\View;
use App\Models\Post;

/**
 * Posts controller
 *
 * PHP version 5.4
 */
class Posts extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        $posts = Post::getAll();

        View::renderTemplate('Posts/index.html', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the add new post
     *
     * @return void
     */
    public function addNewAction()
    {
        if(!empty($_POST['title']) && !empty($_POST['content'])) {
            $post = new Post();
            $post->addPost($_POST['title'], $_POST['content']);

            // Redirect to the posts index page
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/posts/index', true, 303);
            exit;

        } else {
            View::renderTemplate('Posts/add.html');
        }
    }
    
    /**
     * Show the edit page
     *
     * @return void
     */
    public function editAction()
    {
        echo 'Hello from the edit action in the Posts controller!';
        echo '<p>Route parameters: <pre>' .
             htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}
