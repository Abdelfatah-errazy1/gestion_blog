<x-panel>
  <form method="post" action="{{ route('store.comment',$post->slug) }}" class="">
     
      @csrf
      <header class="flex items-center space-x-8 border border-gray-200 bg-gray-50 p-5 mx-2 rounded-xl ">
          <div>
              <img src="{{ asset('images/lary-newsletter-icon.png') }}" width="40"  
                  height="40" class="rounded-xl " alt="">
          </div>
          <div class="boreder border-gray-400">leave a comment !!</div>
      </header>
      <div class="mx-2 my-4">
          <textarea 
          name="body" required
          class="w-full rounded-xl p-2 focus:outline-0 focus:ring text-sm border-b-2 "  
          rows="5" placeholder="leave a quick comment"></textarea>
          @error('body')
              <span class="text-sm text-red-500">{{ $message }}</span>
          @enderror
      </div>
      <div class="flex justify-end ">
        <x-submit-button class=" bg-blue-500 hover:bg-blue-600" >post</x-submit-button>
      </div>
  </form>
</x-panel>