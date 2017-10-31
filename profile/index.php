<?php
    include '../assets/includes/config.php';
    $username_url = urldecode(urlencode(basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH))));

    if ($_SESSION['logged_in'] != 1) {
    } else {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
    }

    $userlook = $mysqli->query("SELECT * FROM users WHERE username = '$username_url'");
    $userrow = mysqli_fetch_array($userlook);
    include '../assets/includes/header.php';
?>
<h1><?php echo $username_url; ?></h1>
<h3><?php echo urldecode($userrow['role']); ?></h3>
<p><?php echo $userrow['bio']; ?></p>
<?php include '../../assets/includes/footer.php'; ?>