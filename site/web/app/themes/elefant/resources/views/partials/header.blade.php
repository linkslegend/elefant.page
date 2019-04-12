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
                  <li id="icons" class="account"><div class="inner-account wishlist"><a href="/login" class="my-wishlist">Wunschliste</a></div></li>
                  <li id="icons" class="account"><div class="inner-account cart"><span class="my-cart">Warenkorb</span></div></li>
                </ul>
            </div>

          </div>
        </nav>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#bs-navbar-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="icon-menu d-none d-lg-block">
              <ul class="header links">
                <li id="hover" class="account myaccount"><a href="/mein-konto" class="my-account">Konto</a>
                  <div id="popup" class="account-popup popover-content">

                      <?php if (is_user_logged_in()) : ?>
                      <span class='username'>Hallo, <?php $current_user = wp_get_current_user(); echo $current_user->user_firstname; echo '&nbsp;' . $current_user->user_lastname; ?></span>
                      <a class='button' href='/mein-konto'>Mein Konto</a>
                      <hr class='hr-light'></hr>
                      <a class='poplink' href='/order-tracking'>Order Tracking</a>
                      <a class='poplink' href='/mein-konto/orders/'>Bestellungen</a>
                      <a class='poplink' href='/faq'>FAQ</a>
                      <a class='poplink' href='/hilfe'>Hilfe</a>
                      <hr class='hr-light'></hr>
                      <a class='poplink' href='<?php echo wp_logout_url( home_url() ); ?>'>Abmelden / Logout</a>
                    <?php else : ?>

                    <div class="arrow"></div> 
                    <a class="button" data-toggle="modal" data-target="#loginmodal" href="#" title="register">Anmelden</a>
                    <span class="light">Sie haben noch kein Konto?</span> 
                    <a class="poplink" href="/mein-konto" title="Register">Registrierung</a>
                    <hr class="hr-light"> 
                    <a class="poplink" href="/faq">FAQ</a>
                    <a class="poplink" href="/hilfe">Hilfe</a>
                    <a class="poplink" href="/telefon-support">Telefon Support</a>

                  <?php endif;?>
                  
                  </div>
                </li>
                <li id="hover" class="account wishlist">
                  <a href="/login" class="my-wishlist">Wunschliste</a>
                  <div id="popup" class="wishlist-popup popover-content">
                      in Bearbeitung ...
                        <!--<?php echo do_shortcode('[ti_wishlist_products_counter]'); ?>-->
                  </div>
                </li>
                <li id="hover" class="account cart">
                      <?php echo do_shortcode('[WooCommerceWooCartPro]'); ?>
                      <span class="my-cart">Warenkorb</span>
                </li>
              </ul>
            </div>
        </div>

    </div><!--end container-->
  </nav>
</header>

@include('partials.login-modal')