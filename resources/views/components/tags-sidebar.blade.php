@props([
    'class' => null,
    'selectedTag' => null,
    'tags',
])

<aside class="tags">
  <h2 class="tags__title title">
    <button class="tags__button" type="button">
      @lang('Теги')
      <svg class="tags__button-icon" width="9" height="12">
        <use xlink:href="{{ asset('images/stack.svg') }}#arrow" />
      </svg>
    </button>
  </h2>

  <ul class="tags__list">
    @foreach ($tags as $tag)
      <li class="tags__item">
        <h3 style="margin: 16px 0 0 0">
          {{ $tag->title }}
        </h3>
      </li>

      @foreach ($tag->children as $tag)
      @if ($selectedTag)
        @if ($tag->id !== $selectedTag->id)
          <li class="tags__item">
            <a class="tags__link" href="{{ route('tags.selected', $tag->slug) }}">
              {{ $tag->title }}
            </a>
          </li>
        @else
          <li class="tags__item">
            <a class="tags__link tags__link--current">
              {{ $selectedTag->title }}
            </a>
          </li>
        @endif
      @else
        <li class="tags__item">
          <a class="tags__link" href="{{ route('tags.selected', $tag->slug) }}">
            {{ $tag->title }}
          </a>
        </li>
      @endif
      @endforeach
    @endforeach
  </ul>
</aside>
