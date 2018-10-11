@extends('layout')
@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)
@section('content')
	

	  <article class="post image-w-text container">
      @if($post->photos->count() === 1)
        <figure><img src=" {{asset($post->photos->first()->url)}}" alt="" class="img-responsive"></figure>
      @elseif($post->photos->count() > 1)              
        @include('posts.carousel')
      @elseif($post->iframe)
        <div class="video">
           {!! $post->iframe !!}
        </div>
      @endif
    <div class="content-post">
      <header class="container-flex space-between">
        <div class="date">
          <span class="c-gris">{{optional($post->published_at)->format('M d')}}</span>
        </div>
        @if($post->category)
          <div class="post-category">
            <span class="category">{{optional($post->category)->name}}</span>
          </div>
        @endif
        
      </header>
      <h1>{{$post->title}}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
          <figure class="block-left"><img src="img/img-post-2.png" alt=""></figure>
          <div>
            {!!$post->body!!}
          </div>
        </div>

        <footer class="container-flex space-between">
          @include('partials.social-links', ['myValue' => $post->title])
          <div class="tags container-flex">
          	@foreach($post->tags as $tag)
            <span class="tag c-gray-1">#{{$tag->name}}</span>
            @endforeach
          </div>
      </footer>
      <div class="comments">
      <div class="divider"></div>
        <div id="disqus_thread"></div>
			@include('partials.disqus-scripts')
                                
      </div><!-- .comments -->
    </div>
  </article>


@endsection

@push('styles')
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}">
@endpush

@push('scripts')
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  
	<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
@endpush