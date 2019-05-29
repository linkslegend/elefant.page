<div class="modal fade loginmodal" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h2>Willkommen</h2>
        </div>
        <div class="modal-body">
          <form id="login" action="login" method="post">
              <p class="status">
              </p>
              <svg class="checkmark hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"><circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/><path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
              <div class="input-1">
                <label class="username" for="username"><i class="fas fa-user"></i></label>
                <input id="username" type="text" name="username" placeholder="Benutzername oder Email">
              </div>
              <div class="input-2">
                <label class="password" for="password"><i class="fas fa-lock"></i></label>
                <input id="password" type="password" name="password" placeholder="Passwort">
              </div>
              <div class="input-3">
                <div class="lost-reg">
                  <a class="lost" href="/my-account/lost-password">Haben Sie Ihr Passwort vergessen?</a><br />
                  <span>Sind Sie ein neuer Kunde?</span> <a class="lost" href="<?php echo home_url(); ?>/register">Jetzt registrieren</a>
                </div>
                <input class="submit_button" type="submit" value="Anmelden" name="submit">
                <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                <div class="seperate"><span class="hr-social">oder</span></div>
                <div class="social-login-container"><?php echo do_shortcode('[woo_social_login]') ?></div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>