@php
    if($type === 'shops'){
      $path = 'storage/shops/';
    }

    if($type === 'products'){
      $path = 'storage/products/';
    }

@endphp

<div>
  @if (empty($filename))
    <img src="{{ asset('img/noimage.png') }}">
  @else
    <img src="{{ asset($path . $filename) }}">
  @endif
</div>
