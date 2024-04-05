<?php
session_start();

include "db.php";
include "users/UserLogin.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];
    $userLogin = new UserLogin();
    $userLogin->loginUser($db, $email, $password);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        form {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #2980b9;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #555;
        }

        a {
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <h1>User Login</h1>
    <form method="POST">
        <label for="userEmail">Email:</label>
        <input type="text" name="userEmail" required>

        <label for="userPassword">Password:</label>
        <input type="password" name="userPassword" required>

        <input type="submit" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a>.</p>
</body>

</html>
