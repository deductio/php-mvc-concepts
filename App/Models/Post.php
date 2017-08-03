<?php

namespace App\Models;

use PDO;
use \App\Controllers\Posts;

/**
 * Post model
 *
 * PHP version 5.4
 */
class Post extends \Core\Model
{

    /**
     * Get all the posts as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        try {
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, content FROM posts ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function addPost($title, $content)
    {
        try {
            $db = static::getDB();

            $stmt = $db->prepare("INSERT INTO posts (title, content) VALUES (:title, :content)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->execute();

            //header('location: '.$_SERVER['REQUEST_URI']);
            Posts::staticIndex();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
