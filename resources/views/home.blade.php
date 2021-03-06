@extends ('main')
@section('content')
@include('subheader')

<div class="wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12 px-5">
                @foreach($list_of_posts as $post)
                <div class="m-5 bg-gray-50 rounded-lg">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="image" class="thumbnail-image">
                        </div>
                        <div class="col-md-6 p-5" style="position:relative;">
                            <small>Posted on {{ date('M d, Y h:i a', strtotime($post->created_at)) }}</small>
                            <h1 class="text-lg font-bold break-words mb-1"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h1>
                            Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> <br>
                            Category: <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
                            <p class="text-sm italic mt-4">{{ $post->excerpt }}</p>
                            <a href="/post/{{ $post->id }}" class="btn btn-outline-primary rounded-full btn-read-more">Read More</a>
                        </div>
                    </div>
                </div>

                @endforeach
                @if(count($list_of_posts) === 0)
                <h1 class="text-center mt-5">No posts found.</h1>
                @endif

                @php
                $currentURL = Request::url();
                $currentURL = explode('/', $currentURL);
                if(!isset($currentURL[3]) || $currentURL[3] !== 'categories'){
                echo '<div class="p-5">'.$list_of_posts->links().'</div>';
                }
                @endphp
            </div>

            <div class="col-md-4">
                <div class="m-5 bg-gray-50 rounded-lg p-5">
                    <h2>Category</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- @if(request('searchbox')) -->
<div class="text-center mt-5">
    <a href="/" class="btn btn-primary">Back Home</a>
</div>
<!-- @endif -->
@endsection