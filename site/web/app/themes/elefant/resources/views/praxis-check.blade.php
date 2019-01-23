{{--
  Template Name: Praxis check Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.praxischeck')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
