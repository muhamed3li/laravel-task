@include('layouts.header')
<div class="container-fluid">
    <main class="tm-main">
        <!-- Search form -->
        <div class="row tm-row">
            <div class="col-12">
                <form method="GET" action="{{route('search')}}" class="form-inline tm-mb-80 tm-search-form">
                    <input class="form-control tm-search-input" name="search" type="text" placeholder="Search..." aria-label="Search">
                    <button class="tm-search-button" type="submit">
                        <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                    </button>
                </form>
                @if($posts->isNotEmpty())
                    @foreach ($posts as $post)
                        <div class="post-list">
                            <p>{{ $post->search }}</p>
                        </div>
                    @endforeach
                @else
                    <div>
                        <h2>No posts found</h2>
                    </div>
                @endif
            </div>
        </div>
        <div class="row tm-row">

            @foreach($posts as $post)
                <article class="col-12 col-md-6 tm-post">
                    <hr class="tm-hr-primary">
                    <a href="{{route('posts.show',$post->id)}}" class="effect-lily tm-post-link tm-pt-60">
                        <div class="tm-post-link-inner">
                            <img src="{{asset('storage/'. $post->img)}}" alt="Image" class="img-fluid">
                        </div>
{{--                        <span class="position-absolute tm-new-badge">New</span>--}}
                        <a href="{{route('posts.show',$post->id)}}"><h2 class="tm-pt-30 tm-color-primary tm-post-title">{{$post->name}}</h2></a>
                    </a>
                    <p class="tm-pt-30">
                        {{$post->description}}
                    </p>
                    <div class="d-flex justify-content-between tm-pt-45">
                        <span class="tm-color-primary">{{$post->category->name}}</span>
                        <span class="tm-color-primary">{{$post->created_at}}</span>
                    </div>
                    <hr>
{{--                    <div class="d-flex justify-content-between">--}}
{{--                        <span>36 comments</span>--}}
{{--                        <span>by Admin Nat</span>--}}
{{--                    </div>--}}
                </article>
            @endforeach

        </div>






@include('layouts.footer')
