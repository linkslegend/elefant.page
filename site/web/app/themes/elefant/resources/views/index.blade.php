@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

<div class="row">
  @while (have_posts()) @php the_post() @endphp
    @include('partials.content-blog-'.get_post_type())
  @endwhile
</div>

  {!! get_the_posts_navigation() !!}
@endsection
