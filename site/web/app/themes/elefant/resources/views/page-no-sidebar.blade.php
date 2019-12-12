{{--
  Template Name: Page with NO Sidebar Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container-fluid">
      <div class="content-box full_width no_background">
        <!--@include('partials.page-header')-->
        @include('partials.content-page')
      </div>
    </div>
  @endwhile
@endsection
