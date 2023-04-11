<x-layout >
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-6   bg-gray-50 border border-gray-200 p-10 rounded-xl  ">
      <h1 class=" text-center font-bold text-xl">Login!    </h1>
      <form action="{{ route('sessions.store') }}" method="post" class="" >
      @csrf
    
  
      <div class="mb-6">
        <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">email</label>
        <input type="email" name="email"  id="email" value="{{ old('email') }}"  class="border border-gray-400 p-2 w-full">
        @error('email')
          <div class="my-2 text-red-600">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-6">
        <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">password</label>
        <input type="password" name="password"  id="password"  class="border border-gray-400 p-2 w-full">
        @error('password')
          <div class="my-2 text-red-600">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-6">
        <x-submit-button class=" bg-blue-500 hover:bg-blue-600" >login</x-submit-button>
      </div>
    
      </form>
    </main>
  </section>
</x-layout>
