<x-layout >
  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @include('posts._header')
    @if ($posts->count() )
      <x-grid-posts :posts='$posts' />
      {{ $posts->links() }}
    @else
        <p>there is no post </p>
    @endif

    
</main>
</x-layout>