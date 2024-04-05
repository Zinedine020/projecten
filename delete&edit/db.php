<?php

class Database {
    public $pdo;

    public function __construct($db = "testdb", $user = "root", $pass = "", $host = "localhost:3306") {
        $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function addUser(User $user) {
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            "name" => $user->Name,
            "email" => $user->Email,
            "password" => $user->HashedPassword()
        ]);
    }

    public function selectData($id = null) {
        $sql = "SELECT * FROM users" . ($id !== null ? " WHERE id = :id" : "");
        $stmt = $this->pdo->prepare($sql);
        
        $stmt->execute($id !== null ? ['id' => $id] : null);
        
        return $id !== null ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectDataByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editUser(string $userName, string $userEmail, string $userPassword, int $userID) {
        $sql = 'UPDATE users SET name=:name, email=:email, password=:password WHERE id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'name' => $userName,
            'email' => $userEmail,
            'password' => password_hash($userPassword, PASSWORD_DEFAULT),
            'id' => $userID
        ]);
    }

    public function deleteUser(int $userID) {
        $sql = 'DELETE FROM users WHERE id=:id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $userID]);
    }
}

?>
