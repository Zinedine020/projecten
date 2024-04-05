<?php
class Database {
public $pdo;

public function __construct($db = "testdb", $user="root", $pass="", $host="localhost:3306") {
try {
        $this->pdo = new PDO("mysql:host=$host; dbname=$db", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         echo "connected to database $db";
        } catch (PDOException $e) {
            echo "Connection faild: " . $e->getMessage();
            } 
    }
    public function users($name, $email, $password) {
        try {
            // Het SQL-insertstatement met named placeholders
            $sql = "INSERT INTO users (name, email, password ) VALUES (:name, :email, :password)";
            // Bereid het statement voor
            $stmt = $this->pdo->prepare($sql);
            // Voer het statement uit
            $stmt->execute([
                "name" => $name,
                "email" => $email,
                "password" => $password
            ]);

            echo "Users added successfully!";
        } catch (PDOException $e) {
            echo "Error adding users: " . $e->getMessage();
        }
    }
}

