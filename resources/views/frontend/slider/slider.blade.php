<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

      @foreach($slider as $slider)
      <div class="item" style="background-image: url({{ asset($slider->img_slider) }});">
        <div class="container-fluid">
          <div class="caption bg-color vertical-center text-left">
            <div class="slider-header fadeInDown-1">{{ $slider->title }}</div>
            <div class="big-text fadeInDown-1"> {{ $slider->description }} </div>
          </div>
        </div>
      </div> 
      @endforeach             
    </div>
  </div>