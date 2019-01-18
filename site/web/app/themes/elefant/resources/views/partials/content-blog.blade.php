@php
$featured_image = get_the_post_thumbnail_url(get_the_id(), 'medium', array( 'class' => 'shadow' ));
@endphp

<div class="col-lg-4 com-md-6 col-sm-6 col-xs-12">

  <article @php post_class() @endphp>
  <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>

  <a href="{{ get_permalink() }}">
    <div class="blog-image">
          <div class="post-featured-image image-shadow lozad" style="background-image:url( @if (has_post_thumbnail()) {!! $featured_image !!} @endif"></div>
    </div>
  </a>

  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>

  <div class="meta">
    @include('partials/entry-meta')
  </div>

</article>

</div>
