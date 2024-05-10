@extends('panel.layouts.master')
@section('title','Bloglar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="col-12">
                        <div class="bg-light p-4 shadow">
                        <form class="row g-3" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-12">
                                    <label for="title" class="form-label">Blog Başlığı</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="col-md-12">
                                    <label for="content" class="form-label">Blog İçeriği</label>
                                    <textarea class="form-control" id="editor" name="content"></textarea>
                                </div>
                                <div class="col-12">
                                         <input type="file" name="images" id="images" class="form-label">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn newBtn p-3">BLOG EKLE</button>
                                </div>
                                </form>    
                        </div>
                    </div>
                </div>
                <!-- end: Summary -->
            </div>
@endsection
