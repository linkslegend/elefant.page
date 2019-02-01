{{--
  Template Name: Contact Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.contact')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
