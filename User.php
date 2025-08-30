<?php
class User {
    public static function authenticate($username, $password) {
        $pdo = Database::connect();
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$username, md5($password)]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
