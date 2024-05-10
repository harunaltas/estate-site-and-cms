@extends('front.layouts.master')
@section('page')
<div class="container">
         
    <div class="row mt-4">
        <div class="col-9">
            <h1>{{ $blog->title }}</h1>
        
            <img src="{{asset('front/images/blog').'/'.$blog->photo}}" alt="" class="w-100 h-75">
          
            <div class="blog-content mt-5">
                {!! $blog->content !!}
            </div>  
        </div>
        <div class="col-3 mt-3">
            <div class="position-sticky end-0 top-0">
            <h4>BENZER İÇERİKLER</h4>
            @foreach($blogs as $blog)
            <a href="{{ route('blog',$blog->slug)}}" class="box">
                <img src="{{asset('front/images/blog').'/'.$blog->photo}}" alt="" class="w-100">
                <span class="text-dark fs-5">{{ $blog->title }}</span>
            </a>
            @endforeach
            </div>

        </div>
    </div>
    
 </div>
@endsection