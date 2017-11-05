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
            
<main>
<v-container style="padding-bottom: 100px; padding-top: 100px;">
<v-layout row wrap align-center>
<v-flex xs2 offset-xs2 md4>
			<div class="text-xs-center">
			<h4><strong><?php echo $username_url; ?></strong></h4>
			<v-avatar size="125px">
                <img
                  class="img-circle elevation-7 mb-2"
                  src="http://www.brandesscadmusrealestate.com/images/team/blank.png"
                >
              </v-avatar>
			<h5 class="text-xs-center"><?php echo urldecode($userrow['role']); ?>
			<br><v-chip color="green" text-color="white">Online</v-chip></h5>
			<center><hr width="20%"></center><br>
			</div>
			<div class="text-xs-center">
			<p>Views: <strong>100</strong>
			<br>Level: <strong>1</strong>
			<br>Reputation Level:<v-chip color="green" text-color="white">+10</v-chip></p>
			<v-btn flat icon color="blue lighten-2"><v-icon>thumb_up</v-icon></v-btn>
    	<v-btn flat icon color="red lighten-2"><v-icon>thumb_down</v-icon></v-btn>
		</div>
	</v-flex>
	<v-flex xs8 md4>
		<div class="text-xs-center">
			<p><?php echo urldecode($userrow['bio']); ?></p>
		</div>
	</v-flex>
</v-layout>
</v-container>
			
<?php include '../assets/includes/footer.php'; ?>
 <script src="https://unpkg.com/vue/dist/vue.js"></script>
 <script src="https://unpkg.com/vuetify/dist/vuetify.js"></script>
 <script src="../assets/js/lang.js"></script>
