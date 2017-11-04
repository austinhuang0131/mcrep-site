<?php
$page = 'Profile';
include '../assets/includes/config.php';
$username_url = urldecode(urlencode(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))));

    if ($_SESSION['logged_in'] != 1) {
    } else {
        $username = $_SESSION['username'];
    }

    $userlook = $mysqli->query("SELECT * FROM users WHERE username = '$username_url'");
    $userrow = mysqli_fetch_array($userlook);
?>
<?php include '../assets/includes/header.php'; ?>
<section>
<v-parallax src="../assets/img/background.jpg" height="1000">
  <v-layout
    column
    align-center
    justify-center
    class="white--text"
  >
    <img src="../assets/img/mcrep.png" alt="MCRep" height="150"><br>
    <h1 class="white--text mb-2 display-1 text-xs-center" v-text="register"></h1>
    <h1><?php echo $username_url; ?></h1>
    <h3><?php echo urldecode($userrow['role']); ?></h3>
    <p><?php echo $userrow['bio']; ?></p>
  </v-layout>
</v-parallax>
</section>

<?php include '../assets/includes/beta.php'; include '../assets/includes/footer.php'; ?>