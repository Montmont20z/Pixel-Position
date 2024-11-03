@props(["tag", 'size'=> 'base'])

@php
    $classes = ' font-bold transition-colors duration-300 border hover:bg-white/25 rounded-xl bg-white/10 ';

    if ($size == 'base'){
        $classes .= ' px-5 py-1 text-sm';
    } elseif ($size == 'small') {
        $classes .= ' px-3 py-1 text-[10px]';
    }
@endphp

<a href="/tags/{{$tag->name}}" class="{{ $classes }}" > {{ $tag->name }} </a>