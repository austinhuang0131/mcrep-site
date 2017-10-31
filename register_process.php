<?php
$error = '';
include 'assets/includes/config.php';

    $username = urlencode($mysqli->escape_string($_POST['username']));
    $email = urlencode($mysqli->escape_string($_POST['email']));
    $role = urlencode($mysqli->escape_string($_POST['role']));
    $bio = urlencode($mysqli->escape_string($_POST['bio']));
    $password = password_hash($mysqli->escape_string($_POST['password']), PASSWORD_BCRYPT);
    $hash = $mysqli->escape_string(md5(rand(0,1000)));
    $result = $mysqli->query("SELECT * FROM users WHERE username = '$username'");

    if ($result->num_rows > 0) {
        $error = 'User with that email already exists.';
    } else {
        $sql = "INSERT INTO users (username, email, role, bio, password, hash) VALUES ('$username', '$email', '$role', '$bio', '$password', '$hash')";

        $user = mysqli_fetch_array($result);

        if ($mysqli->query($sql)){
            $_SESSION['logged_in'] = false;;

            header("Location: " . $site['url'] . "login");
            exit();
        } else {
            $error = 'Registration failed!';
        }
    }

echo $error;
?>