<?php $page = 'Home'; include 'assets/includes/config.php'; include 'assets/includes/header.php'; ?>

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
              MCRep is a place dedicated to hiring staff, content creators, developers, designers and more on a safe and collective platform where you can hire those who are reputable.
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
          <v-parallax src="assets/img/background.jpg" height="380">
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

<?php  include 'assets/includes/beta.php'; include 'assets/includes/footer.php'; ?>