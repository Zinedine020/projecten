<?php

class UserLogin
{
    public function loginUser(Database $db, $email, $password)
    {
        try {
            $userData = $db->selectDataByEmail($email);

            if ($userData && password_verify($password, $userData['password'])) {
                $_SESSION['user_id'] = $userData['id'];
                $_SESSION['user_name'] = $userData['name'];
                header("Location: home.php");
            } else {
                throw new Exception("Invalid email or password");
            }
        } catch (Exception $e) {
            echo "Login failed: " . $e->getMessage();
        }
    }
}

?>
