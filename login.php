<?php
$page = 'Home';
$error = '';
include 'assets/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = urlencode($mysqli->escape_string($_POST['username']));
    $password = $_POST['password'];

    $result = $mysqli->query("SELECT * FROM users WHERE username = '$username'");
    
    if ($result->num_rows == 0) {
        $error = 'Username not found.';
    } else {
        $user = mysqli_fetch_array($result);
        if (password_verify($password, $user['password'])) {
            $user['password'] == "";
            $_SESSION['username'] = $user['username'];
            $_SESSION['active'] = $user['active'];
            $_SESSION['logged_in'] = true;
            header("Location: " . $site['url'] . "profile/" . $_SESSION['username']);
            exit();
        } else {
            $error = 'Wrong password.';
        }
    }
}

include 'assets/includes/header.php';
 ?>
<form method="POST">
    <label>Username</label>
    <input type="text" name="username" required>
    <br>
    <label>Password</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Sign In</button>
    <?php echo $error; ?>
</form>