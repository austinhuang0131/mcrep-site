<!DOCTYPE html>
<html>
<head>

  <title>MCRep</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
  <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
 <div id="app">
   <v-app light>
    <v-toolbar class="white">
        <a href="index.php"><v-toolbar-title v-text="titleupper" style="font-weight: 700;"></v-toolbar-title></a>
        <v-chip color="red" text-color="white">Beta </v-chip>
        <v-spacer></v-spacer>
        <v-toolbar-side-icon class="hidden-md-and-up"></v-toolbar-side-icon>
        <v-toolbar-items class="hidden-sm-and-down">
        <?php if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {?>
            <v-btn flat><a href="profile/<?php echo $_SESSION['username'] ?>"<strong><?php echo $_SESSION['username'] ?></strong></a></v-btn>
            <v-btn flat><a href="logout.php" class="list__tile">Logout</a></v-btn>

        <?php } else { ?>
            <v-btn flat>Not logged in</v-btn>
            <v-btn flat><a href="login.php" class="list__tile">Login</a></v-btn>
            <v-btn flat><a href="register.php" class="list__tile">Register</a></v-btn>
        <?php } ?>
        </v-toolbar-items>
    </v-toolbar>
            
    <main>
      <v-content>
