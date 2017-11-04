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
                        $_SESSION['logged_in'] = false;;

                        header("Location: " . $site['url'] . "/login");
                        exit();
                    } else {
                        $error = 'Registration failed! Please contact Spacey with error: SQL_REG_SESSION_ERROR';
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

include 'assets/includes/header.php'; ?>

        <section>
          <v-parallax src="assets/img/background.jpg" height="1000">
            <v-layout
              column
              align-center
              justify-center
              class="white--text"
            >
              <img src="assets/img/mcrep.png" alt="MCRep" height="150"><br>
              <h1 class="white--text mb-2 display-1 text-xs-center" v-text="register"></h1>

              <form id="register" method="POST">
                <label>Username</label>
                  <input type="text" name="username" required><br>
                <label>Email</label>
                  <input type="text" name="email" required><br>     
                <label>Role</label>
                  <select name="role" required>
                      <option name="Developer">Developer</option>
                      <option name="Staff">Staff</option>
                      <option name="Content Creator">Content Creator</option>
                      <option name="Graphic Designer">Graphic Designer</option>
                  </select><br>
                <label>Bio</label>
                  <textarea rows="5" name="bio"></textarea><br>
                <label>Password</label>
                  <input type="password" name="password" id="password" required><br>
                <label>Confirm Password</label>
                  <input type="password" required id="checkPassword" name="checkPassword"><br>
                
                  <center><v-btn
                  color="info"
                  :loading="loading4"
                  @click.native="loader = 'loading4'"
                  :disabled="loading4"
                  type="submit"
                  >
                  Register
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
