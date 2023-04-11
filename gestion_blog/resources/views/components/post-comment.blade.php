@props(['comment'])
<x-panel>
  <article class="flex space-x-4 ">
    <div class="my-3 flex-shrink-0 ">
        <img src="{{ asset('images/lary-newsletter-icon.png') }}" width="60" height="60" alt="" class="rounded-xl">
    </div>
    <div>
        <header class="mb-5">
            <h3 class="font-bold">{{ $comment->auther->name }}</h3>
            <p class="mt-4 block text-gray-400 text-xs">
              Published <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
          <p>{{ $comment->body }}</p>
    </div>
  
  </article>
</x-panel>