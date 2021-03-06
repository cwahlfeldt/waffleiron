@php
  $title = get_sub_field('title');
  $accordions = get_sub_field('accordions');
  $style_fg_color = get_sub_field('style')['foreground_color'];
  $style_bg_color = get_sub_field('style')['background_color'];
  $style_line_color = get_sub_field('style')['line_color'];
@endphp

@if ($accordions)
<div class="accordions w-full h-full py-3 {{ $title ? '' : '-mt-12' }}">
  <div class="container h-full w-full">
    <div class="container-sm mx-auto w-full {{ $title ? '' : 'pb-12' }} {{ !$title && !$style_bg_color ? 'pt-20' : '' }}" style="background-color: {{ $style_bg_color }};">
      @if ($title)
        <h2 class="text-center mb-5 font-sans tracking-widest font-xl uppercase" style="color: {{ $style_fg_color }};">
          {{ $title }}
          @if ($style_line_color)
            <hr style="border-color: {{ $style_line_color }}; text-align: {{$style_sizing['value']}};" class="w-10 my-2 border border-solid border-1 mt-6">
          @endif
        </h2>
      @endif
      <div class="accordion-items md:px-32 sm:px-16 xs:px-4 w-full">
        @foreach($accordions as $a)
          <button class="accordion-item py-3 h-auto w-full text-left border-t-2 border-solid border-blue hover:cursor-pointer">
            <div style="width: 100%; height: 100%; min-width: 0;" class="relative flex flex-row justify-between items-center w-full">
              <h2 class="accordion-title font-slab font-semibold tracking-wide md:text-lg text-sm text-blue uppercase hover:text-orange hover:cursor-pointer">
                {{ $a['title'] }}
              </h2>
              <i class="fa fa-angle-double-down trans"></i>           
            </div>
            <div class="accordion-content pt-4 pb-8 hidden" style="color: {{ $style_fg_color }};">
              {!! $a['content'] !!}
            </div>
          </button>
        @endforeach 
      </div>
    </div>
  </div>
</div>
@endif
