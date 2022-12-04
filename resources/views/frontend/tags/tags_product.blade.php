@php
 $tags = App\Models\Product::groupBy('tags_product')->select('tags_product')->get();   
@endphp

<div class="sidebar-widget product-tag wow fadeInUp">
    <h3 class="section-title">{{ __('Product tags') }}</h3>
    <div class="sidebar-widget-body outer-top-xs">
      <div class="tag-list"> 
        @foreach($tags as $tag)
        <a class="item active" title="tags" href="{{ url('product/tags/'.$tag->tags_product) }}">{{ str_replace(',',', ',$tag->tags_product)  }}</a> 
        @endforeach
    </div>
    </div>
</div>