<div class="meta post-meta d-flex align-items-center">
  <div class="user-image">
  @php
      echo get_avatar( get_the_author_meta( 'user_email' ), 75 );
  @endphp
  </div>
<div class="item author vcard">
  {{ __('Von', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author" class="fn">
    {{ get_the_author() }}
  </a>
</div>
<time class="item updated" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>

</div>
