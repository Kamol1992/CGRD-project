<?php
class Post {
    public static function all() {
        $pdo = Database::connect();
        return $pdo->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function find(int $id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create(string $title, string $description) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("INSERT INTO posts (title, description) VALUES (?, ?)");
        return $stmt->execute([$title, $description]);
    }

    public static function update(int $id, string $title, string $description) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("UPDATE posts SET title=?, description=? WHERE id=?");
        return $stmt->execute([$title, $description, $id]);
    }

    public static function delete(int $id) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("DELETE FROM posts WHERE id=?");
        return $stmt->execute([$id]);
    }
}
