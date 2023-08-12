<x-guest-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Show Artical') }}
    </h2>
  </x-slot>

  <div class="max-w-7xl mx-auto p-6 lg:p-8">
    <div class="flex justify-center">
      <p>articles</p>
    </div>

    <div class="mt-2">

      <h2>title: {{$article->title}}</h2>
      <p>content: {{$article->content}}</p>
      <a href="#">user: {{$article->User->name}}</a>
    </div>
    <div class="flex items-center justify-end mt-4">
      <x-primary-button class="ml-4">
        <a class="edit-btn" href="{{route('article.edit',$article->id)}}">edit</a>
      </x-primary-button>
    </div>
    <form action="{{route('article.destroy',$article->id)}}" method="post">
      @csrf
      @method('DELETE')
      <!-- <input class="delete-dtn" type="submit" value="delete"> -->
      <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
          {{ __('delete') }}
        </x-primary-button>
      </div>
    </form>
  </div>
</x-guest-layout>