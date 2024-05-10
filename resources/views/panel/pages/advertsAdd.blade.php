@extends('panel.layouts.master')
@section('title','İlanlar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="col-12">
                        <div class="bg-light p-4 shadow">
                        <form class="row g-3" action="{{ route('admin.adverts.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="col-md-6">
                                    <label for="title" class="form-label">İlan Başlığı</label>
                                    <input type="text" class="form-control" name="title" id="title">
                                </div>
                                <div class="col-md-3">
                                    <label for="city" class="form-label">İl</label>
                                    <select class="form-select" name="city" id="city" >
                                    <option>Cyprus/KKTC</option>
                                </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="town" class="form-label">Bölge</label>
                                    <select class="form-select" name="town" id="town" >
                                        <option>Lefkoşa</option>
                                        <option>Girne</option>
                                        <option>Gazimağusa</option>
                                        <option>Lefke</option>
                                        <option>Güzelyurt</option>
                                        <option>İskele</option>
                                       </select>
                                </div>
                                                                
                                <div class="col-12">
                                    <label for="address" class="form-label">Adres</label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                                </div>
                                <div class="col-12">
                                    <label for="map" class="form-label">Map (Link)</label>
                                    <input type="text" class="form-control" id="map" name="map" placeholder="">
                                </div>
                                <div class="col-md-2">
                                    <label for="status" class="form-label">Durumu</label>
                                    <select id="status" name="status" class="form-select">
                                    @foreach($status as $statu)
                                    <option value="{{$statu}}">{{$statu}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="type" class="form-label">Tipi</label>
                                    <select id="type" name="type" class="form-select">
                                    @foreach($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="isItem" class="form-label">Eşya Durumu</label>
                                    <select id="isItem" name="isItem" class="form-select">
                                    @foreach($isItems as $isItem)
                                    <option value="{{$isItem}}">{{$isItem}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="payment_methods" class="form-label">Ödeme Şekli</label>
                                    <select id="payment_methods" name="payment_methods" class="form-select">
                                    @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{$paymentMethod}}">{{$paymentMethod}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="number_rooms" class="form-label">Oda Sayısı</label>
                                    <select id="number_rooms" name="number_rooms" class="form-select">
                                    @foreach($rooms as $number_rooms)
                                    <option value="{{$number_rooms}}">{{$number_rooms}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label for="buildingage" class="form-label">Bina Yaşı</label>
                                    <input type="text" class="form-control" id="buildingage" name="buildingage">
                                </div>
                                <div class="col-md-1">
                                    <label for="floorlocation" class="form-label">Bulunduğu Kat</label>
                                    <input type="text" class="form-control" id="floorlocation" name="floorlocation">
                                </div>
                                <div class="col-md-1">
                                    <label for="squaremeters" class="form-label">Metre</label>
                                    <input type="text" class="form-control" id="squaremeters" name="squaremeters">
                                </div>
                                <div class="col-md-1">
                                    <label for="price" class="form-label">Fiyat</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <div class="col-12">
                                         <label for="description" class="form-label">Açıklama</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                        <label for="images" class="form-label">Resimler</label>
                                         <input type="file" name="images[]" id="images" class="form-label" multiple>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn newBtn p-3">İLANI EKLE</button>
                                </div>
                                </form>    
                        </div>
                    </div>
                </div>
                <!-- end: Summary -->
            </div>
@endsection
