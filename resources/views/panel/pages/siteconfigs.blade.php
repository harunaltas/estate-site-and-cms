@extends('panel.layouts.master')
@section('title','Ayarlar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->
                <div class="row g-3">
                    
                    <div class="col-12">
                        <div class="bg-light p-4 shadow">
                        <form class="row g-3" action="{{ route('admin.siteconfigsupdate') }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
         
                                <div class="col-md-3">
                                    <label for="title" class="form-label">Site Adı</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $config->title }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="subtitle" class="form-label">Site Alt Başlık</label>
                                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $config->subtitle }}">
                                </div>

                                <div class="col-md-3">
                                    <label for="facebook" class="form-label">Facebook (Link)</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="" value="{{ $config->facebook }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="instagram" class="form-label">Instagram (Link)</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $config->instagram }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="phone" class="form-label">Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $config->phone }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="whatsapp" class="form-label">Whatsapp Telefon</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $config->whatsapp }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $config->email }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="buttonbgcolor" class="form-label">Yazı Renkleri</label>
                                    <input type="color" class="form-control" id="buttonbgcolor" name="buttonbgcolor" value="{{ $config->buttonbgcolor }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="address" class="form-label">Adres</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $config->address }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="map" class="form-label">Map (Link)</label>
                                    <input type="text" class="form-control" id="map" name="map" value="{{ $config->map }}">
                                </div>
                                <div class="col-md-12">
                                    <label for="hakkimizda" class="form-label">Hakkımızda</label>
                                    <textarea name="text_one" id="hakkimizda" class="form-control">{{ $config->text_one }}</textarea>
                                </div>
                                <div class="col-md-8">
                                    <input type="file" class="form-control" id="images" name="images">
                                </div>
                                @if($config->image != "" || $config->image != null)
                                <div class="col-md-4">
                                <a href="{{ route('admin.imageDelete') }}" class="btn btn-secondary">Arkaplanı Kaldır</a>
                                </div>
                                @endif
                                <div class="col-12">
                                    <button type="submit" class="btn newBtn p-3">AYARLARI GÜNCELLE</button>
                                </div>
                                </form>    
                           
                        </div>
                       
                    </div>
                </div>
                <!-- end: Summary -->
            </div>
@endsection
