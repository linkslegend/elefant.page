{{--
  Template Name: Allgemeine IT Beratung Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.allgemeine-it-beratung')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
