{{--
  Template Name: Fernwartung Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.fernwartung')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
