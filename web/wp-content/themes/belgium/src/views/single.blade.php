@extends('master')

@php
  global $post;
  $name = get_the_title();
@endphp

@section('content')
  @if (get_post_type() === 'attorneys')
    @php
      $pic = get_field('picture');
      $img = get_field('image');
      $job_title = get_field('title');
      $accordions = get_field('accordions');
      $content = get_field('content');
      $style = get_field('style');
    @endphp

    <section class="heading attorney-heading w-full relative">

      <div class="flex sm:flex-row flex-col w-full h-full">
        <div class="side-wrap h-full sm:order-1 order-2 2xl:w-1/4 w-full lg:w-1/3 sm:mr-3 bg-blue relative py-12 px-4" style="background-color: {{ $style['background_color'] }};">
          <div class="h-full w-full flex flex-col justify-start items-center relative">
            <img class="logo" src="/wp-content/uploads/2019/07/TM_Icon_Orange.svg" alt="">

            <div class="text my-auto">
              <hr style="color: {{ $style['line_color'] }};" class="w-10 my-4 border border-orange border-solid border-1 mx-auto"> 
              <p class="text-white text-center tracking-widest font-condensed uppercase font-thin text-3xl leading-snug my-0">
                {{ $name }}
              </p>
              <p class="text-white text-center tracking-widest font-amp uppercase font-thin text-sm leading-snug my-0">
                {{ $job_title }}
              </p>
              <hr style="color: {{ $style['line_color'] }};" class="w-10 my-5 border border-orange border-solid border-1 mx-auto"> 
            </div>
          </div>
        </div>

        <div class="title sm:order-2 order-1 md:w-full lg:w-3/4 sm:w-full sm:ml-3 md:bg-top sm:bg-right bg-cover bg-center md:px-12 md:py-12 py-40 px-8" style="background-image: url({{ $img['sizes']['1440'] }});">
          <div class="flex flex-col justify-end sm:items-end items-center h-full">
            <p class="heading-branded-text lg:text-left text-center tracking-wider text-white sm:font-lg text-center font-slab font-thin uppercase leading-tight text-5xl">
              {!! get_field('branding')['title'] !!}
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="heading attorney-heading-content h-full w-full">
      <div class="flex sm:flex-row flex-col w-full h-full">
        <div class="side-wrap md:block hidden h-full sm:order-1 order-2 2xl:w-1/4 md:w-1/2 lg:w-1/3 sm:w-full bg-blue relative py-12 px-4" style="background-color: {{ $style['background_color'] }};">
          <div class="h-full flex flex-col justify-center items-center relative">
            <div class="profile lg:block hidden flex flex-col items-center justify-center">
              <div class="bg-white p-6 w-auto">
                <img class="" src="{{ $pic['sizes']['340'] }}" alt="">
                <div class="flex flex-col">
                  <p class="text-blue w-auto text-left tracking-widest font-slab uppercase font-thin text-lg leading-normal pt-3 my-0">
                    {{ $name }}
                  </p>
                  <p class="text-orange w-auto text-left tracking-widest font-amp uppercase font-thin text-sm leading-snug my-0">
                    {{ $job_title }}
                  </p>
                  <div class="flex flex-row justify-between w-full h-full pt-6">
                    <a download class="vcard text-center py-1 px-3 mr-2 font-amp w-full text-base hover:bg-tan hover:text-white text-tan border-2 border-solid border-tan uppercase" href="{{ get_field('uploads')[0]['upload']['url'] }}">VCARD</a>
                    <a class="contact text-center py-1 px-3 ml-2 w-full font-amp text-base hover:bg-tan hover:text-white uppercase text-tan border-2 border-solid border-tan " target"_top" href="{{ get_field('links')[0]['link'] }}">Contact</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="content-thing bg-tan md:py-24 py-16 lg:pl-48 px-6 md:pr-32 sm:mt-6 title sm:order-2 order-1 md:w-full lg:w-3/4 w-full md:bg-center bg-left bg-left bg-cover border-l-8 md:border-solid md:border-white">
          <div class="content-cont">
            <p class="md:text-left text-center tracking-wider sm:text-lg font-slab font-thin uppercase leading-tight text-orange 2xl:mx-20 lg:mx-12 md:mx-0">
              Profile
              {{-- <hr style="border-color: {{ $style['color']['line_color'] }};" class="w-10 my-4 border border-orange border-solid border-1"> --}}
              <hr class="w-10 my-6 border border-blue md:mx-0 mx-auto border-solid border-1 2xl:mx-20 lg:mx-12 md:mx-0 mx-auto">
            </p>

            @php
              $content = nl2br($post->post_content);
            @endphp
            <div class="font-serif text-blue py-6  2xl:mx-20 lg:mx-12 md:mx-0 mx-auto">{!! $content !!}</div>
          </div>
    
          @if ($accordions)
            <div class="accordions w-full h-full">
              {{-- {{ $accordions }} --}}

              <div class="accordion-items w-full h-full">
                @foreach($accordions as $a)
                  <button class="accordion-item flex flex-col items-between py-2 h-auto w-full text-left border-t-2 border-solid border-blue hover:cursor-pointer">
                    <h2 class="font-condensed font-semibold tracking-wide text-lg text-blue uppercase hover:text-orange hover:cursor-pointer">
                      {{ $a['title'] }}
                    </h2>
                    <div class="accordion-content hidden">
                      {!! $a['copy'] !!}
                    </div>
                  </button>
                @endforeach 
              </div>
            </div>
          @endif
        </div>
      </div>
    </section>

  @elseif (get_post_type() === 'post')

    @include('post')

  @endif
@endsection
