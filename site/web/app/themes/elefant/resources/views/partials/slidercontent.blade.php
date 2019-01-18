@php
$featured_image = get_the_post_thumbnail(get_the_id(), 'medium');
@endphp


<article @php post_class() @endphp>
  <div class="article-inner">
  <div class="image">
    @if(has_post_thumbnail())
        {!! $featured_image !!}
    @endif()
  </div>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary">
    @php the_excerpt() @endphp
  </div>
  </div>
</article>
