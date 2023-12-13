@props([
    'class' => null,
    'post',
])

@php
  $className = $class ? "$class post-card" : 'post-card';
@endphp

<a
  class="{{ $className }}"
  href="{{ asset($post->image) }}"
  target="_blank"
>
  <img
    class="post-card__image"
    src="{{ asset($post->thumb_image) }}"
    width="220"
    height="160"
    alt="{{ $post->alternative_text }}"
    loading="lazy"
  >
</a>
