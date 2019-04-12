@php
$featured_image = get_the_post_thumbnail_url(get_the_id(), 'large', array( 'class' => 'shadow' ));
@endphp

<article @php post_class() @endphp>
  <div class="container-fluid">
  <div class="content-centered">
    <h1 class="entry-title">{{ get_the_title() }}</h1>
    @include('partials/entry-meta')
  </div>

  <div class="post-featured-image image-shadow" style="background-image:url(@if (has_post_thumbnail()) {!! $featured_image !!} @endif()"></div>

<div class="content-holder">
  <div class="entry-content">
    @php the_content() @endphp
  </div>
  <aside class="sidebar">
      @include('partials.sidebarposts')
  </aside>
</div>


  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}

  </footer>
  @php comments_template('/partials/comments.blade.php') @endphp
  </div>
</article>
