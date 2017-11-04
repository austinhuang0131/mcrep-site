<?php
$page = 'Login';
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
?>
<?php   include 'assets/includes/header.php'; ?>
<section>
    <v-parallax src="assets/img/background.jpg" height="600">
        <v-layout
            column
            align-center
            justify-center
            class="white--text"
        >
        <img src="assets/img/mcrep.png" alt="MCRep" height="150"><br>
        <h1 class="white--text mb-2 display-1 text-xs-center" v-text="login"></h1>

        <form method="POST">
            <label>Username</label>
                <input type="text" name="username" required><br>
            <label>Password</label>
                <input type="password" name="password" required><br>
            <center><v-btn
            color="info"
            :loading="loading4"
            @click.native="loader = 'loading4'"
            :disabled="loading4"
            type="submit"
            >
            Login
            <span slot="loader" class="custom-loader">
                <v-icon light>cached</v-icon>
            </span>
            </v-btn></center>
            <?php if ($error !== "") {?>
            <v-alert color="error" icon="warning" value="true"><?php echo $error; ?></v-alert>
            <?php } ?>
        </form>
        </v-layout>
    </v-parallax>
</section>
<?php  include 'assets/includes/beta.php'; include 'assets/includes/footer.php'; ?>

