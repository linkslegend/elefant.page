{{--
  Template Name: Webseite Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.webseite-content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
