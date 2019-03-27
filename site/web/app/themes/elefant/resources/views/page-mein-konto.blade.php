@extends('layouts.container')
@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.page-header')
    @include('partials.content-page')
    <!-- @include('partials.sliderproduct') -->
  @endwhile
@endsection

