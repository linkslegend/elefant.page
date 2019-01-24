{{--
  Template Name: Page with Sidebar Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    <div class="container">
      <div class="content-box">
        @include('partials.page-header')
        @include('partials.content-page')
      </div>
      <aside class="sidebar">
        @include('partials.sidebarpage')
      </aside>
    </div>
  @endwhile
@endsection
