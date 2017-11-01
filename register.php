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

include 'assets/includes/header.php';
?>
<!DOCTYPE html>
<html>
<head>

  <title>MCRep</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
 <div id="app">
   <v-app light>

    <v-toolbar class="white" style="white-space: nowrap;">
        <v-toolbar-title v-text="titleupper" style="font-weight: 700;"></v-toolbar-title>
        <v-chip color="red" text-color="white">Beta</v-chip>
        <form method="GET" action="search.php" style="padding-left: 5%;">
        <v-icon>search</v-icon><input type="text" placeholder="Search for username..." name="my_value">
      </form>

		</form>

        <v-spacer></v-spacer>
        <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
        <v-toolbar-items class="hidden-sm-and-down">
        <v-btn flat><a href="login.php" class="list__tile list__tile--link">Login</a></v-btn>
        <v-btn flat><a href="register.php" class="list__tile list__tile--link">Register</a></v-btn>
        <v-btn flat><a href="profile/<?php echo $_SESSION['username'] ?>" class="list__tile list__tile--link">Your Profile</a></v-btn>
        </v-toolbar-items>
    </v-toolbar>

    <main>
      <v-content>
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
                <v-alert color="error" icon="warning" value="true"><?php echo $error; ?></v-alert>
              </form>
            </v-layout>
          </v-parallax>
        </section>

        <section>
          <v-container grid-list-xl>
            <v-layout row wrap justify-center class="my-5">
              <v-flex xs12 sm4>
                <v-card class="elevation-0 transparent">
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline" id="beta">Beta Disclaimer</div>
                  </v-card-title>
                  <v-card-text>
                    MCRep, its owners and developers take a proactive approach to ensuring the wellbeing and
                    quality of its site. However, in the current <strong>beta</strong> state of the site,
                    you must be aware that there is a possibility that:
                    <ol>
                      <li>User account information may be wiped or reset at any time.</li>
                      <li>The site may be temporarily closed for scheduled or unscheduled maintenance at anytime.</li>
                      <li>The site may have issues(otherwise know as 'bugs' or 'glitches') with its content that may prevent some features to be used.</li>
                      <li>Policies and agreements are subject to change at any time.</li>
                    </ol>
                    <br><v-icon class="red--text">favorite</v-icon> Thanks for taking part in our open beta!
                    <br><v-icon class="red--text">code</v-icon> Please report bugs to devs@mcrep.us
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 sm4 offset-sm1>
                <v-card class="elevation-0 transparent">
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline">Contact us</div>
                  </v-card-title>
                  <v-card-text>
                    If at any point you need to contact us for buissness, support or to make reports please use the following email addresses.
                  </v-card-text>
                  <v-list class="transparent">
                    <v-list-tile>
                      <v-list-tile-action>
                        <v-icon large class="blue--text text--lighten-2">email</v-icon>
                      </v-list-tile-action>
                      <v-list-tile-content>
                        <v-list-tile-title><strong>Buisness</strong> &nbsp;arus@mcrep.us</v-list-tile-title>
                      </v-list-tile-content>
                    </v-list-tile>
                    <v-list-tile>
                        <v-list-tile-action>
                          <v-icon large class="blue--text text--lighten-2">build</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title><strong>Bug Reports + Site Suggestions</strong> &nbsp;devs@mcrep.us</v-list-tile-title>
                        </v-list-tile-content>
                      </v-list-tile>
                    <v-list-tile>
                      <v-list-tile-action>
                        <v-icon large class="blue--text text--lighten-2">code</v-icon>
                      </v-list-tile-action>
                        <v-list-tile-content>
                            <v-list-tile-title><strong>Lead Developer</strong> &nbsp;spacey@mcrep.us</v-list-tile-title>
                      </v-list-tile-content>
                    </v-list-tile>
                  </v-list>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </section>

        <v-footer class="blue darken-2">
          <v-layout row wrap align-center>
            <v-flex xs12>
              <div class="white--text ml-3">
                &copy; MCRep 2017 |
                Made with <v-icon class="red--text">favorite</v-icon>
                by <a class="white--text" href="http://twitter.com/mrspacebob" target="_blank">Spacey</a>
              </div>
            </v-flex>
          </v-layout>
        </v-footer>
      </v-content>
    </main>

  </v-app>
 </div>

 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>
 <script src="assets/js/lang.js"></script>
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
</body>
</html>
