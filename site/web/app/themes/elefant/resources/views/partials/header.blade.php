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
