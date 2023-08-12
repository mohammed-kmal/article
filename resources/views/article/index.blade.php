<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('All articles') }}
    </h2>
  </x-slot>

  <section class="latest-articles has-padding alternate-bg" id="articles">
    @if ( count ( $articles) > 0 )
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h4>Latest Articles</h4>
        </div>
      </div>
      <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4">
          <article class="article-post">
            <a href="{{route('article.show',$article->id)}}">
              <div class="article-image has-overlay" style="background-image: url(img/article-01.jpg)">
                <!-- <span class="featured-tag">Featured</span> -->
              </div>
              <figure>
                <figcaption>
                  <h2>{{$article->title}}</h2>
                  <p>{{$article->content}}</p>
                </figcaption>
              </figure>
            </a>
            <ul class="article-footer">
              <li class="article-category">
                <a href="#">{{$article->User->name}}</a>
              </li>
              <li class="article-comments">
                <span><i class="fa fa-comments"></i> 51</span>
              </li>
            </ul>
          </article>
        </div>
        @endforeach
      </div>
      @else
      @endif
  </section>
</x-app-layout>