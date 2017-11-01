<?php $page = 'Home'; include 'assets/includes/header.php'; include 'assets/includes/config.php'; ?>
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

    <v-toolbar class="white">
        <v-toolbar-title v-text="titleupper" style="font-weight: 700;"></v-toolbar-title>
        <v-chip color="red" text-color="white">Beta</v-chip>
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
          <v-parallax src="assets/img/background.jpg" height="600">
            <v-layout
              column
              align-center
              justify-center
              class="white--text"
            >
              <img src="assets/img/mcrep.png" alt="MCRep" height="150"><br>
              <h1 class="white--text mb-2 display-1 text-xs-center" v-text="title"></h1>
              <div class="subheading mb-3 text-xs-center">The marketplace to find the staff you need, and avoid scammers.</div>
              <br>
              <v-alert color="warning" icon="priority_high" value="true">
                Please Note: MCRep is in the beta phase. For more information please visit <a href="#beta">here</a>.
              </v-alert>
            </v-layout>
          </v-parallax>
        </section>

        <section>
          <v-layout
            column
            wrap
            class="my-5"
            align-center
          >
            <v-flex xs12 sm4 class="my-2">
              <div class="text-xs-center">
                  <v-card-text>
                    MCRep is a platform dedicated to hiring staff, content creators, developers, 
                    designers and more on a safe and collective platform where you can hire those who are reputable.
                  </v-card-text>
              </div>
            </v-flex>
            <v-flex xs12>
              <v-container grid-list-xl>
                <v-layout row wrap align-center>
                  <v-flex xs12 md3 offset-md3>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">person</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline text-xs-center">Find the most reputable staff</div>
                      </v-card-title>
                      <v-card-text>
                        Using our reputation system (coming soon), you can reach out to the staff that
                        have a certain reputation level. This way, you know from experience that
                        you are in good hands.
                      </v-card-text>
                    </v-card>
                  </v-flex>
                  <v-flex xs12 md3>
                    <v-card class="elevation-0 transparent">
                      <v-card-text class="text-xs-center">
                        <v-icon x-large class="blue--text text--lighten-2">warning</v-icon>
                      </v-card-text>
                      <v-card-title primary-title class="layout justify-center">
                        <div class="headline">Avoid scammers</div>
                      </v-card-title>
                      <v-card-text>
                        Using our dedicated scammer page and reports from the community,
                        we are able to indentify those who are scammers and unreputable
                        and prevent you from hiring them.
                      </v-card-text>
                    </v-card>
                  </v-flex>
                </v-layout>
              </v-container>
            </v-flex>
          </v-layout>
        </section>

        <section>
          <v-parallax src="assets/background.jpg" height="380">
            <v-layout column align-center justify-center>
              <div class="headline white--text mb-3 text-xs-center">Finding staff has never been easier</div>
              <em>Create an account today</em>
              <v-btn
                class="blue lighten-2 mt-5"
                dark
                large
                href="/signup.php"
              >
                Get Started
              </v-btn>
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
</body>
</html>