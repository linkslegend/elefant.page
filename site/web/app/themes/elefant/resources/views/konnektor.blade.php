{{--
  Template Name: TI Konnektor Template
--}}

@extends('layouts.app')

@section('content')
  @include('partials.konnektor')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
