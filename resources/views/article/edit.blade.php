<x-guest-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Edit Artical') }}
    </h2>
  </x-slot>

  <form method="POST" action="{{route('article.update',['article' => $article->id])}}">
        @csrf
        @method('PUT')
        <!-- title -->
        <div>
            <x-input-label for="article-title" :value="__('Title')" />
            <x-text-input id="article-title" class="block mt-1 w-full" type="text" name="article-title" :value="$article->title" required autofocus autocomplete="article-title" />
            <x-input-error :messages="$errors->get('article-title')" class="mt-2" />
        </div>

        <!-- article-content -->
        <div class="mt-4">
            <x-input-label for="article-content" :value="__('Content')" />
            <x-text-input id="article-content" class="block mt-1 w-full" type="text" name="article-content" :value="$article->content" required autocomplete="article-content" />
            <x-input-error :messages="$errors->get('article-content')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Seve') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>