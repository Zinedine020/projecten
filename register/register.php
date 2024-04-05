<?php
session_start();

include "db.php";
include "users/user.class.php";
include "users/UserRegistration.php";

$db = new Database();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['userName'];
    $email = $_POST['userEmail'];
    $password = $_POST['userPassword'];

    $newUser = new User($name, $email, $password);
    $userRegistration = new UserRegistration();
    $userRegistration->registerUser($db, $newUser);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f2f2f2; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">

    <form method="POST" style="background-color: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); width: 300px; margin: 0 auto;">

        <h1 style="text-align: center; color: #333; margin-bottom: 20px;">User Registration</h1>

        <label for="userName" style="display: block; margin-bottom: 8px; color: #555;">Name:</label>
        <input type="text" name="userName" required style="width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 5px;">

        <label for="userEmail" style="display: block; margin-bottom: 8px; color: #555;">Email:</label>
        <input type="text" name="userEmail" required style="width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 5px;">

        <label for="userPassword" style="display: block; margin-bottom: 8px; color: #555;">Password:</label>
        <input type="password" name="userPassword" required style="width: 100%; padding: 10px; margin-bottom: 15px; box-sizing: border-box; border: 1px solid #ddd; border-radius: 5px;">

        <input type="submit" value="Register" style="background-color: #007bff; color: #fff; cursor: pointer; width: 100%; padding: 10px; border: none; border-radius: 5px;">

        <p style="text-align: center; margin-top: 15px; color: #888;">Already have an account? <a href="login.php" style="color: #007bff; text-decoration: none;">Login here</a>.</p>

    </form>

</body>
</html>
