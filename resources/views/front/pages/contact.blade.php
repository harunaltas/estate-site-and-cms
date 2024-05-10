@extends('front.layouts.master')
@section('page')
            <div class="container-fluid contact-page m-0 p-2">
                        <div class="row contact-boxs d-flex align-items-center justify-content-center">
                            <a hreF="mailto:{{$config->email }}" class="col-md-2 box d-flex align-items-center justify-content-center flex-column ">
                            <img class="mt-3" src="{{ asset('front/images/location.png') }}" alt="" style="width: 50px;">
                            <span class="btn mt-3 mb-3">{{ $config->address }}</span>
                            </a>  
                            <a hreF="mailto:{{$config->email }}" class="col-md-2 box d-flex align-items-center justify-content-center flex-column ">
                            <img class="mt-3" src="{{ asset('front/images/phone.png') }}" alt="" style="width: 50px;">
                            <span class="btn mt-3 mb-3">{{ $config->phone }}</span>
                            </a>  
                            <a hreF="mailto:{{$config->email }}" class="col-md-2 box d-flex align-items-center justify-content-center flex-column ">
                            <img class="mt-3" src="{{ asset('front/images/email.png') }}" alt="" style="width: 50px;">
                            <span class="btn mt-3 mb-3">{{ $config->email }}</span>
                            </a>  
                            <a hreF="tel:{{$config->phone }}" class="col-md-2 box d-flex align-items-center justify-content-center flex-column " >
                            <img class="mt-3" src="{{ asset('front/images/whatsapp.png') }}" alt="" style="width: 50px;">
                            <span class="btn mt-3 mb-3">{{ $config->whatsapp }}</span>
                            </a>  
                        </div>
                <div class="row mt-2">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="map w-100 d-flex align-items-center justify-content-center">
                        {!! $config->map !!}
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="social-media d-flex align-items-center justify-content-center">
                            <a href="{{$config->facebook }}" class="btn social-link">
                            <img src="{{ asset('front/images/facebook.png') }}" alt="Facebook" style="width: 25px;">
                            </a>
                            <a href="{{$config->instagram }}" class="btn social-link">
                            <img src="{{ asset('front/images/instagram.png') }}" alt="Instagram" style="width: 25px;">
                            <a>
                        </div>
                    </div>
                </div>
            </div>
@endsection