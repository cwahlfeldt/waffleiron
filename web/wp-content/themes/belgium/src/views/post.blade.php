@extends('master')

@php
  global $wp_query;
@endphp

@section('content')

<section class="post designs">
  @include('designs.banner', array(
    'variant' => true,
  ))

  @if (have_rows('designs'))
    @while (have_rows('designs')) @php(the_row())

      @if (get_row_layout() === 'content')
        @include('designs.content')
      @endif

      @if (get_row_layout() === 'banner')
        @include('designs.banner')
      @endif

      @if (get_row_layout() === 'call_to_action')
        @include('designs.call-to-action')
      @endif

      @if (get_row_layout() === 'attorneys')
        @include('designs.attorneys')
      @endif

      @if (get_row_layout() === 'testimonials')
        @include('designs.testimonials')
      @endif

      @if (get_row_layout() === 'areas_of_practice')
        @include('designs.areas-of-practice')
      @endif

      @if (get_row_layout() === 'accordions')
        @include('designs.accordions')
      @endif

    @endwhile
  @endif
</section>

<div class="posts-controls">
  <div class="next">{!! next_posts_link() !!}</div> 
  <div class="previous">{!! previous_posts_link() !!}</div> 
</div>

@endsection
