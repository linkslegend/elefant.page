{{--
  Template Name: TI Anwendungen Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.anwendungen')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
