@include('layouts.header')

<div class="container-fluid">
    <main class="tm-main">
        <!-- Search form -->
        <div class="row tm-row">
            <div class="col-12">
                <form method="GET" action="" class="form-inline tm-mb-80 tm-search-form">
                    <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..." aria-label="Search">
                    <button class="tm-search-button" type="submit">
                        <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <div class="row tm-row">
            <div class="col-12">
                <hr class="tm-hr-primary tm-mb-55">
                    <img class="w-100" src="{{asset('storage/'. $post->img)}}" >
            </div>
        </div>
        <div class="row tm-row">
            <div class="col-lg-8 tm-post-col">
                <div class="tm-post-full">
                    <div class="mb-4">
                        <h2 class="pt-2 tm-color-primary tm-post-title">{{$post->name}}</h2>
                        <p>{{$post->description}}</p>
                        <hr>
                        <p class="tm-mb-40">{{$post->created_at->format('Y/m/d')}}</p>
                        <div class="row tm-row tm-mt-100 tm-mb-75">
                            <div class="tm-prev-next-wrapper">

                                @if($prev)
                                    <a href="{{route('posts.show',$prev->id)}}" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Prev</a>
                                @endif
                                @if($next)
                                    <a href="{{route('posts.show',$next->id)}}" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <aside class="col-lg-4 tm-aside-col">
                <div class="tm-post-sidebar">
                    <hr class="mb-3 tm-hr-primary">
                    <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                    <ul class="tm-mb-75 pl-5 tm-category-list">
                        @foreach($categories as $category)
                        <li><a href="#" class="tm-color-primary">{{$category->name}}</a></li>
                        @endforeach
                    </ul>



                </div>
            </aside>
        </div>

@include('layouts.footer')
