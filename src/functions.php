<?php

class PostMod {

public function fetchAll() {
    global $conn;
    try {
        $query = "SELECT * FROM posts";
        $stmt = $conn->query($query);
        $posts = $stmt->fetchAll();
    } catch(\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
    return $posts;
}

public function fetchById($id) {
    global $conn;

    try {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindValue(':id', $id);                                                   
        $stmt->execute();
        $post = $stmt->fetch();
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }

    return $post;
}
public function update($postData) {
	    global $conn;

	    try {
	        $query = "UPDATE posts
	            SET title = :title, content = :content, author = :author
	            WHERE id = :id";

	        $stmt = $conn->prepare($query);
	        $stmt->bindValue(':title', $postData['title']);
	        $stmt->bindValue(':content', $postData['content']);
	        $stmt->bindValue(':author', $postData['author']);
	        $stmt->bindValue(':id', $postData['id']);
	        $result = $stmt->execute(); // returns true/false
	    } catch(\PDOException $e) {
	        throw new \PDOException($e->getMessage(), (int) $e->getCode());
	    }

	    return $result;
    }


    
}