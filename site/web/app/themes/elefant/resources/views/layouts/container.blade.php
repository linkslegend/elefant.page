<!DOCTYPE html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
  
  @if (
  is_shop() ||
  is_product_category() ||
  is_cart() ||
  is_checkout() ||
  is_front_page() ||
  is_page_template( 'templates/about.php' ) ||
  is_page_template( 'views/page-sidebar.blade.php' )
  )
    @include('partials.preloader')
  @endif
  
  <div class="overlay"></div>
    @php do_action('get_header') @endphp
    @include('partials.header')
    <div class="wrap" role="document">
      <div class="content">
        <div class="container-fluid">
          <main class="main">
            @yield('content')
          </main>
          @if (App\display_sidebar())
            <aside class="sidebar">
              @include('partials.sidebar')
            </aside>
          @endif
        </div>
      </div>
    </div>
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
