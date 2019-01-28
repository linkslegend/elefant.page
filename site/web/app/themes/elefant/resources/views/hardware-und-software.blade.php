{{--
  Template Name: Hardware & Software Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.hardware-und-software')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
