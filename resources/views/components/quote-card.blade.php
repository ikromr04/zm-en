@props([
    'class' => null,
    'selectedTag' => null,
    'quote',
])

@php
  $className = $class ? "$class quote-card" : 'quote-card';
  $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $quote->created_at);
  $from = \Carbon\Carbon::now();
  $diff_in_days = $to->diffInDays($from);
  $new = $diff_in_days <= 7;
@endphp

<blockquote class="{{ $className }} tags-hidden">
  <a class="quote-card__link" href="{{ route('quotes.selected', $quote->slug) }}">
    #{{ str_pad($quote->slug, 4, '0', STR_PAD_LEFT) }}
  </a>

  <div class="quote-card__top">
    <q class="quote-card__quote">{{ $quote->quote }}</q>

    <div class="quote-card__tags">
      @if ($selectedTag)
        <a class="quote-card__tag quote-card__tag--current">
          <svg width="6" height="10">
            <use xlink:href="{{ asset('images/stack.svg') }}#triangle" />
          </svg>
          {{ $selectedTag->title }}
        </a>
      @endif
      @foreach ($quote->tags as $tag)
        @if ($selectedTag)
          @if ($tag->id != $selectedTag->id)
            <a class="quote-card__tag" href="{{ route('tags.selected', $tag->slug) }}">
              <svg width="6" height="10">
                <use xlink:href="{{ asset('images/stack.svg') }}#triangle" />
              </svg>
              {{ $tag->title }}
            </a>
          @endif
        @else
          <a class="quote-card__tag" href="{{ route('tags.selected', $tag->slug) }}">
            <svg width="6" height="10">
              <use xlink:href="{{ asset('images/stack.svg') }}#triangle" />
            </svg>
            {{ $tag->title }}
          </a>
        @endif
      @endforeach
      @if (count($quote->tags) - 3 > 0)
        <button class="quote-card__button quote-card__button--toggle-tags" type="button" aria-label="@lang('Показать/скрыть теги')" data-show-text="@lang('Ещё теги')" data-hide-text="@lang('Скрыть теги')"></button>
      @endif
    </div>
  </div>

  <footer class="quote-card__bottom">
    <div class="quote-card__buttons">
      @php
        $all = null;
        if (session('user')) {
            $all = DB::table('quote_user')
                ->where('quote_id', $quote->id)
                ->where('user_id', session('user')->id)
                ->where('favorite_id', null)
                ->first();
        }
      @endphp
      <button class="quote-card__button{{ $quote->favorite ? ' quote-card__button--favorite' : '' }}" type="button" data-quote="{{ json_encode($quote) }}" data-all={{ json_encode($all) }} data-folders="{{ json_encode($quote->favorites) }}" @if (session('user')) onclick="window.showFavoriteModal(event)"
      @else
        onclick="window.showLoginModal()" @endif>
        <span class="quote-card__button-icon">
          <svg width="16" height="16">
            <use xlink:href="{{ asset('images/stack.svg') }}#{{ $quote->favorite ? 'bookmark' : 'favorite' }}" />
          </svg>
        </span>
        Add
      </button>
      @if ($quote->twitter)
        <a class="quote-card__button" href="{{ $quote->twitter }}" target="_blank">
          Read on
          <span class="quote-card__button-icon">
            <svg width="14" height="14">
              <use xlink:href="{{ asset('images/stack.svg') }}#twitter" />
            </svg>
          </span>
        </a>
      @endif
    </div>

    <div class="quote-card__share">
      <div class="quote-card__share-links">
        <a class="quote-card__share-link" title="@lang('Фейсбук')" href="https://www.facebook.com/sharer/sharer.php?u={{ route('quotes.selected', $quote->slug) }}" target="_blank">
          <svg width="16" height="16">
            <use xlink:href="{{ asset('images/stack.svg') }}#facebook" />
          </svg>
        </a>
        @php
          $share_text = preg_replace('#<[^>]+>#', ' ', $quote->quote);
          $share_text = mb_strlen($share_text) < 170 ? '„' . $share_text . '“ — Zafar Mirzo' : mb_substr($share_text, 0, 166) . '...“ — Zafar Mirzo';
        @endphp
        <a class="quote-card__share-link" title="@lang('Твиттер')" href="https://twitter.com/intent/tweet?url={{ route('quotes.selected', $quote->slug) }}&text={{ $share_text }}" target="_blank">
          <svg width="12" height="10">
            <use xlink:href="{{ asset('images/stack.svg') }}#twitter" />
          </svg>
        </a>
        <a class="quote-card__share-link" title="@lang('Телеграм')" href="https://telegram.me/share/url?url={{ route('quotes.selected', $quote->slug) }}" target="_blank">
          <svg width="16" height="16">
            <use xlink:href="{{ asset('images/stack.svg') }}#telegram" />
          </svg>
        </a>
        <button class="quote-card__share-link" type="button" aria-label="Copy">
          <svg width="13" height="13">
            <use xlink:href="{{ asset('images/stack.svg') }}#copy" />
          </svg>
        </button>
      </div>

      <button class="quote-card__share-button" type="button" aria-label="@lang('Поделиться')">
        <svg width="16" height="18">
          <use xlink:href="{{ asset('images/stack.svg') }}#share" />
        </svg>
      </button>
    </div>
  </footer>
</blockquote>
