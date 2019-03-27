<header id="header" class="banner">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <div class="inner-header bg-white">
      <a class="navbar-brand" href="{{ home_url('/') }}" alt="{{ get_bloginfo('name', 'display') }}">
        <img class="logo" alt="intermac logo" src="@asset('images/logo-elefant2.png')" width="30" height="30" alt="">
      </a>
      <nav class="nav-primary">
        <div class="collapse navbar-collapse" id="bs-navbar-collapse">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu($primarymenu) !!}
          @endif

          <div class="icon-menu mobile-block d-block d-md-none">
              <ul class="header links">
                <li id="icons" class="account"><div class="inner-account myaccount"><a href="/account" class="my-account">Konto</a></div></li>
                <li id="icons" class="account"><div class="inner-account wishlist"><a href="/login">Wishlist</a></div></li>
                <li id="icons" class="account"><div class="inner-account cart"><span>Warenkorb</span></div></li>
              </ul>
          </div>

        </div>
      </nav>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="icon-menu d-none d-lg-block">
            <ul class="header links">
              <li id="hover" class="account myaccount"><a href="/account" class="my-account">Konto</a>
                <div id="popup" class="account-popup popover-content">
                  <div class="arrow"></div> 
                  <a class="button" data-toggle="modal" data-target="#loginmodal" href="#" title="register">Anmelden</a>
                  <span class="light">Don't have a account?</span> 
                  <a class="poplink" href="/my-account" title="Register">Registrierung</a>
                  <hr class="hr-light"> 
                  <a class="poplink" href="/faq">FAQ</a>
                  <a class="poplink" href="/help">Hilfe</a>
                  <a class="poplink" href="/help">Telefon Support</a>
                </div>
              </li>
              <li id="hover" class="account wishlist"><a href="/login">Wishlist</a>
                <div id="popup" class="wishlist-popup popover-content">
                    in Bearbeitung ...
                      <!--<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>-->
                </div>
              </li>
              <li id="hover" class="account cart">
                    <?php echo do_shortcode('[WooCommerceWooCartPro]'); ?>
                    <span>Warenkorb</span>
              </li>
            </ul>
          </div>
        </div>

  </div><!--end container-->
</nav>
</header>

<div class="modal fade loginmodal" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <!--<div class="profile-image"><?php echo get_avatar( $id_or_email, $size, $default, $alt, $args ); ?></div>-->
    <div class="modal-content lozad" data-background-image="https://d1zczzapudl1mr.cloudfront.net/geometric-abstraction2.png" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2>Welcome</h2>
      </div>
      <div class="modal-body">
        <form id="login" action="login" method="post">
            <p class="status"></p>
            <div class="input-1">
              <label class="username" for="username"><i class="fa fa-lock" aria-hidden="true"></i></label>
              <input id="username" type="text" name="username" placeholder="Username or Email">
            </div>
            <div class="input-2">
              <label class="password" for="password"><i class="fa fa-user" aria-hidden="true"></i></label>
              <input id="password" type="password" name="password" placeholder="Password">
            </div>
            <div class="input-3">
              <div class="lost-reg">
                <a class="lost" href="/my-account/lost-password">Lost your password?</a><br />
                <span>Are you a new customer?</span> <a class="lost" href="<?php echo home_url(); ?>/register">Register Now</a>
              </div>
              <input class="submit_button" type="submit" value="Login" name="submit">
              <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
              <div class="seperate"><span class="hr-social">or</span></div>
              <div class="social-login-container"><?php echo do_shortcode('[TheChamp-Login]') ?></div>
              <!--<div class="secure-connection">Secure connection</div>-->
            </div>
        </form>
      </div>
    </div>
  </div>
</div>