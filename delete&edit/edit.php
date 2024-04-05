<?php
include "db.php";
$db = new Database();

if (isset($_GET['ID'])) {
    $userID = $_GET['ID'];
    $userData = $db->selectData($userID);

    if (!$userData) {
        echo "User not found.";
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            // Gebruik de waarden uit het formulier of behoud de oorspronkelijke waarden als niet ingevuld
            $userName = isset($_POST['userName']) ? $_POST['userName'] : $userData['name'];
            $userEmail = isset($_POST['userEmail']) ? $_POST['userEmail'] : $userData['email'];
            $userPassword = isset($_POST['userPassword']) ? $_POST['userPassword'] : $userData['password'];

            $db->editUser($userName, $userEmail, $userPassword, $userID);
            header("Location: home.php?success");
            exit;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #495057;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 15px;
            color: #dc3545;
        }
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
</head>
<body>
    <form method="POST">
        <h1>User Edit</h1>

        <?php if (isset($userData)) : ?>
            <label for="userName">Name:</label>
            <input type="text" name="userName" value="<?php echo $userData['name']; ?>">

            <label for="userEmail">Email:</label>
            <input type="text" name="userEmail" value="<?php echo $userData['email']; ?>">

            <label for="userPassword">Password:</label>
            <input type="password" name="userPassword" value="">

            <input type="submit" value="Update">

            <!-- Annuleerknop -->
            <a href="home.php">&#8592; Back</a>
        <?php else : ?>
            <p>User not found.</p>
        <?php endif; ?>
    </form>
</body>
</html>