<section class="modal" onclick="window.closeModal(event, this)">
  <div class="modal__container">
    <h2 class="modal__title title title--secondary">@lang('Выберите папку')</h2>

    <div class="favorite-list">
      <label class="favorite-list__item">
        @php
          $checked = DB::table('quote_user')
              ->where('quote_id', $quote->id)
              ->where('user_id', session('user')->id)
              ->where('favorite_id', null)
              ->first();
        @endphp
        <input class="visually-hidden" type="checkbox" value="" @if ($checked) checked @endif>
        <span class="favorite-list__icon">
          <svg width="16" height="16">
            <use xlink:href="/images/stack.svg#check" />
          </svg>
        </span>
        @lang('Все избранное')
      </label>

      @foreach ($favorites as $favorite)
        <label class="favorite-list__item">
          @php
            $checked = DB::table('quote_user')
                ->where('quote_id', $quote->id)
                ->where('user_id', session('user')->id)
                ->where('favorite_id', $favorite->id)
                ->first();
          @endphp
          <input class="visually-hidden" type="checkbox" value="{{ $favorite->id }}" @if ($checked) checked @endif>
          <span class="favorite-list__icon">
            <svg width="16" height="16">
              <use xlink:href="/images/stack.svg#check" />
            </svg>
          </span>
          {{ $favorite->title }}
        </label>
      @endforeach
    </div>

    <button class="button button--secondary" type="button" data-quote-id="{{ $quote->id }}" style="max-width: none; margin-top: 32px;" onclick="window.addToFavorites(event)">
      @lang('Сохранить')
    </button>

    <button class="modal__close" type="button" title="@lang('Закрыть окно')">
      <svg width="11" height="10">
        <use xlink:href="/images/stack.svg#close" />
      </svg>
    </button>
  </div>
</section>
