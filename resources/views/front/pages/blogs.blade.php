@extends('front.layouts.master')
@section('page')
<div class="container">
         
         <h1 class="title">BLOG</h1>
         <div class="row home-blogs">
            @foreach($blogs as $blog)
           <a href="{{ route('blog',$blog->slug)}}" class="col-md-6 col-12 home-blog p-0">
               <img src="{{asset('front/images/blog').'/'.$blog->photo}}" alt="">
               <div class="blog-info d-flex flex-column text-white">
                 <span class="fs-5">{{ $blog->created_at }}</span>
                 <span class="fs-2">{{ $blog->title}}</span>
               </div>
           </a>
           @endforeach
         </div>
    
 </div>
@endsection