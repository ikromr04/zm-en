@extends('layouts.app')

@section('content')
  <main class="tag-selected container">
    <h1 class="visually-hidden">@lang('Философское творчество')</h1>

    <x-tags-sidebar :tags="$data->tags" :selectedTag="$data->selectedTag" />

    <section class="quotes">
      <h2 class="visually-hidden">@lang('Мысли автора')</h2>

      <ul class="quotes__list">
        @foreach ($data->quotes as $quote)
          <li class="quotes__item">
            <x-quote-card :quote="$quote" :selectedTag="$data->selectedTag" />
          </li>
        @endforeach
      </ul>

      {{ $data->quotes->links('components.pagination') }}
    </section>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset('js/pages/tags/selected.min.js') }}" type="module"></script>
@endsection
