<?php
$page = "Register";
$error = "";
include 'assets/includes/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] == $_POST['checkPassword']) {
        if (strcspn($_POST['password'], '0123456789') != strlen($_POST['password'])) {
            if (strlen($_POST['password']) >= 6) {
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

                    if ($mysqli->query($sql)) {
                        $_SESSION['logged_in'] = false;

                        header("Location: " . $site['url'] . "login");
                        exit();
                    } else {
                        $error = 'Registration failed!';
                    }
                }
            } else {
                $error = 'Password is less than 6 characters.';
            }
        } else {
            $error = 'Password does not contain a number.';
        }
    } else {
        $error = 'Password is not the same!';
    }
}

include 'assets/includes/header.php';
?>
<form id="register" method="POST">
    <label>Username</label>
    <input type="text" name="username" required>
    <br>
    <label>Email</label>
    <input type="text" name="email" required>
    <br>
    <label>Role</label>
    <select name="role" required>
        <option name="Developer">Developer</option>
		<option name="Staff">Staff</option>
        <option name="Content Creator">Content Creator</option>
        <option name="Graphic Designer">Graphic Designer</option>
    </select>
    <br>
    <label>Bio</label>
    <textarea rows="5" name="bio"></textarea>
    <br>
    <label>Password</label>
    <input type="password" name="password" id="password" required>
    <br>
    <label>Confirm Password</label>
    <input type="password" required id="checkPassword" name="checkPassword">
    <br>
    <button type="submit">Register</button>
    <?php echo $error; ?>
</form>
<script>
    document.getElementById("checkPassword").onchange = function() {checkPassword()};
    
    function checkPassword() {
        var password = document.getElementById("password").value;
        var checkPassword = document.getElementById("checkPassword").value;
        
        if(password != checkPassword) {
            var checkInput = document.getElementById("checkPassword");
            checkInput.style.backgroundColor = "red";
        } else {
            var checkInput = document.getElementById("checkPassword");
            checkInput.style.backgroundColor = "green";
        }
    }
</script>