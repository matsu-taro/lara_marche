@props(['status' => 'info'])

@php
    if(session('status') === 'info'){
      $bgColor = 'bg-blue-200';
    }
    if(session('status') === 'alert'){
      $bgColor = 'bg-red-200';
    }
@endphp

@if(session('message'))
<div class="{{ $bgColor}} w-1/2 mx-auto p-2">
  {{session('message')}}
</div>
@endif