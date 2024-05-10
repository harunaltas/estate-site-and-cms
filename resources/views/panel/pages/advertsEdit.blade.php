@extends('panel.layouts.master')
@section('title','İlanlar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->
                <div class="row g-3">
                    <div class="col-12">
                        <div class="bg-light p-4 shadow">
                        <form class="row g-3" action="{{ route('admin.adverts.update',$advert) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                                <div class="col-md-6">
                                    <label for="title" class="form-label">İlan Başlığı</label>
                                    <input type="text" class="form-control" name="title" id="title" value="{{ $advert->title }}">
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
                                    <input type="text" class="form-control" id="address" name="address" value="{{ $advert->address }}">
                                </div>
                                <div class="col-12">
                                    <label for="map" class="form-label">Map (Link)</label>
                                    <input type="text" class="form-control" id="map" name="map" value="{{ $advert->map }}">
                                </div>
                                <div class="col-md-2">
                                    <label for="status" class="form-label">Durumu</label>
                                    <select id="status" name="status" class="form-select">
                                    @foreach($status as $statu)
                                    <option value="{{$statu}}" {{ (strtolower($advert->status) == strtolower($statu)) ? 'selected' : ''   }} >{{$statu}}</option>
                                    @endforeach

                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="type" class="form-label">Tipi</label>
                                    <select id="type" name="type" class="form-select">
                                     @foreach($types as $type)
                                    <option value="{{$type}}" {{ (strtolower($advert->type) == strtolower($type)) ? 'selected' : ''   }} >{{$type}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="isItem" class="form-label">Eşya Durumu</label>
                                    <select id="isItem" name="isItem" class="form-select">
                                    @foreach($isItems as $isItem)
                                    <option value="{{$isItem}}" {{ (strtolower($advert->isItem) == strtolower($isItem)) ? 'selected' : ''   }} >{{$isItem}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="payment_methods" class="form-label">Ödeme Şekli</label>
                                    <select id="payment_methods" name="payment_methods" class="form-select">
                                    @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{$paymentMethod}}" {{ (strtolower($advert->payment_methods) == strtolower($paymentMethod)) ? 'selected' : ''   }} >{{$paymentMethod}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="number_rooms" class="form-label">Oda Sayısı</label>
                                    <select id="number_rooms" name="number_rooms" class="form-select">
                                    <option value="">Seçiniz...</option>
                                    @foreach($rooms as $number_rooms)
                                    <option value="{{$number_rooms}}" {{ (strtolower($advert->number_rooms) == strtolower($number_rooms)) ? 'selected' : ''   }} >{{$number_rooms}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <label for="buildingage" class="form-label">Bina Yaşı</label>
                                    <input type="text" class="form-control" id="buildingage" name="buildingage" value="{{ $advert->buildingage }}">
                                </div>
                                <div class="col-md-1">
                                    <label for="floorlocation" class="form-label">Bulunduğu Kat</label>
                                    <input type="text" class="form-control" id="floorlocation" name="floorlocation" value="{{ $advert->floorlocation }}">
                                </div>
                                <div class="col-md-1">
                                    <label for="squaremeters" class="form-label">Metre</label>
                                    <input type="text" class="form-control" id="squaremeters" name="squaremeters" value="{{ $advert->squaremeters }}">
                                </div>
                                <div class="col-md-1">
                                    <label for="price" class="form-label">Fiyat</label>
                                    <input type="text" class="form-control" id="price" name="price" value="{{ $advert->price }}">
                                </div>
                                <div class="col-12">
                                         <label for="description" class="form-label">Açıklama</label>
                                        <textarea class="form-control" id="description" name="description" rows="3" >{{ $advert->description }}</textarea>
                                </div>
                                <div class="col-12">
                                        <label for="images" class="form-label">RESİM EKLE</label>
                                         <input type="file" name="images[]" id="images" class="form-label" multiple>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn newBtn p-3">İLANI GÜNCELLE</button>
                                    
                                </div>

                                </form>    
                                <div class="row d-flex align-items-end justify-content-end flex-row">
                                <div class="col-2">
                                        <div class="box d-flex flex-column p-3 rounded ">
                                            <span>Eklenme Tarihi</span>
                                            <span class="fs-4 text-dark">{{  $advert->created_at->format('d/m/Y'); }} </span>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                    <div class="box d-flex flex-column p-3 rounded ">
                                            <span>Son Güncelleme Tarihi</span>
                                            <span class="fs-4 text-dark">{{  $advert->updated_at->format('d/m/Y'); }} </span>
                                        </div>
                                        </div>


                                </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mt-2">
                <div class="col-12">
                        <div class="bg-light p-4 shadow">
                            @if(count($images) <= 0) <h6>Resim Bulunamadı...</h6> @endif()
                            <div class="images d-flex align-items-center  justify-content-start flex-wrap ">
                            @foreach($images as $image)
                                <div class="image  m-2 p-1 d-flex align-items-center justify-content-center flex-column">
                                <img src="{{ asset('front/images').'/'.$image->image }}" alt="" class="img-fluid m-2" style="width:250px; height:230px; object-fit:cover; border-radius:20px; ">
                                <div class="d-flex align-items-center justify-content-center flex-row-reverse w-100 gap-2">
                                <form action="{{ route('admin.advertsimages.destroy',$image) }}" method="POST">
                                           @method('DELETE')
                                           @csrf
                                         <button type="submit" class="btn btn-info" onClick="return confirm('Silmek İstediğinize Emin misiniz ?')">SİL</button>   
                                 </form>  
                                 <form action="{{ route('admin.advertsimages.update',$image) }}" method="POST">
                                           @method('PUT')
                                           @csrf
                                       
                                         <input type="hidden" name="adverts_id" value="{{$advert->id}}" class="form-control">
                                         <button type="submit" class="btn btn-info" {{ ($image->isCoverPhoto == 1 ? 'disabled' : '')  }}>KAPAK FOTOĞRAFI YAP</button>   

                                        
                                 </form>  
                                </div>   
                                </div>
                                @endforeach

                            </div>
                     
                                    
                          
                        </div>
                </div>


                </div>
                <!-- end: Summary -->
            </div>
@endsection
