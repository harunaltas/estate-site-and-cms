@extends('front.layouts.master')
@section('page') 
<section class="container p-5">
            <div class="row">
                <div class="col-12 d-flex justify-content-between align-items-center flex-wrap">
                    <h1>{{ $advert->title }}</h1>
                    <span class="fs-3">{{ number_format($advert->price) }} &pound</span>
                </div>
                <div class="col-12 my-2">
                    <a href="#" class="btn" style="background-color: rgb(19, 244, 19); text-transform: uppercase;">{{ $advert->status }}</a>
                    <a href="#" class="btn text-white" style="background-color: rgb(63, 65, 63); text-transform: uppercase;">{{ $advert->type }}</a>
                </div>
                <div class="col-12">
                    <span> {{ $advert->address }} {{ $advert->city }}/{{ $advert->town }}</span>
                </div>
            </div>
            <div class="row mt-3">
                <?php 
                        $div1 = 6;
                        $div2 = 6;
                    if(count($advert->images) > 6)
                    {
                        $div1 = 6;
                        $div2 = 6;
                    }
                    else {
                        $div1 = 8;
                        $div2 = 4;
                    }
                  
                ?>
            <div class = "col-lg-{{$div1}} col-md-12  img-display p-0">
                <div class="img-showcase">
                @foreach($advert->images as $image)
              <img src = "{{asset('front/images').'/'.$image->image}}" alt = "Kavi image">
              @endforeach
                </div>
            </div>
                <div class="col-lg-{{$div2}} col-md-12">
                    <div class="advert_detail_images d-flex align-items-start justify-content-start flex-wrap img-select">
                    @foreach($advert->images as $image)
                    <a href = "#" data-id = "{{$loop->iteration}}">
                            <img src="{{asset('front/images').'/'.$image->image}}" alt = "Kavi image">
                         
                         </a>
                         @endforeach
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex align-items-center justify-content-between">
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->type }}</span>
                    <span class="info_head">Konut Tipi</span>
                   </div>
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->number_rooms }}</span>
                    <span class="info_head">Oda</span>
                   </div>
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->floorlocation }}</span>
                    <span class="info_head">Kat</span>
                   </div>
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->buildingage }}</span>
                    <span class="info_head">Bina Yaşı</span>
                   </div>
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->isItem }}</span>
                    <span class="info_head">Eşya Durumu</span>
                   </div>
                   <div class="advert_detail_info">
                    <span class="info_desc">{{ $advert->payment_methods }}</span>
                    <span class="info_head">Ödeme Tipi</span>
                   </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="d-flex flex-column">
                        <span class="mb-3 fs-5">Açıklama</span>
                        <span class="fs-4 fw-bold">{{ $advert->title }}</span>
                    </div>

                    <p class="mt-3">
                    {{ $advert->description }}
                    </p>
                </div>

            </div>
            <div class="row">
               <div class="col-12">
               @if($advert->map != "null")
    <div class="map-wrapper">
       {!!$advert->map!!}
      </div>
    @endif
               </div>

            </div>
            </section>

    @endsection