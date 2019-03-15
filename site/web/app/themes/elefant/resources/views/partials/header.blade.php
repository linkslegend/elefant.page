<header id="header" class="banner">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
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

  </div><!--end container-->
</nav>
</header>
