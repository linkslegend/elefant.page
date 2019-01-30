@php
  $Posts = new WP_Query(array(
    'post_type' => 'post', // Default or custom post type
    'posts_per_page' => 10, // Max number of posts per page
    'category_name' => 'blog', // Your category (optional)
  ));
@endphp

@extends('layouts.front')

@section('content')
  @include('partials.banner')

<div class="container">
  @if (!have_posts())
          <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

<h2 class="slider-title">Unser Blog</h2>
  <div class="multiple-items">
  @if ($Posts->have_posts())
  @while ($Posts->have_posts()) @php $Posts->the_post() @endphp
    @include('partials.slidercontent-'.get_post_type())
  @endwhile
  @endif
  </div>

  {!! get_the_posts_navigation() !!}
</div>
@endsection
