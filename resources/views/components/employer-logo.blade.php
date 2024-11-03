@props(['employer', 'width' => 90])

<img src="{{ asset($employer->logo) }}" alt="employer logo" class="rounded-lg" width="{{$width}}" />