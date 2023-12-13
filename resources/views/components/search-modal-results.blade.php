<ul>
  @if (count($data->quotes) == 0)
    <li>@lang('Ничего не найдено')</li>
  @endif
  @foreach ($data->quotes as $quote)
    <li>
      <a href="{{ route('quotes.selected', $quote->slug) }}">
        {{ $quote->quote }}
      </a>
    </li>
  @endforeach
</ul>
