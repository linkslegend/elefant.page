{{--
  Template Name: Datenrettung Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.datenrettung')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
