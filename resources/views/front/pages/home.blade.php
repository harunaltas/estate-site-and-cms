@extends('front.layouts.master')
@section('page')

<section class="home">
                <div class="row px-5">
                        <div class="col-md-5 col-12 main-filter-container mt-5">
                            <form action="{{ route('ilanlar') }}" method="get" class="row g-3">
                                <div class="col-md-6">
                                <label for="city" class="form-label">Şehir</label>
                                <select class="form-select" name="city" id="city" >
                                    <option>Cyprus/KKTC</option>
                                </select>
                                </div>
                                <div class="col-md-6">
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
                                    <div class="col-md-12">
                                        <label for="type" class="form-label">Konut Tipi</label>
                                        <select id="type" name="type" class="form-select">
                      <option selected value="">Konut Tipi</option>
                      @foreach($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                      </select>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="city" class="form-label">Oda Sayısı</label>
                                          <select id="numberrooms" name="numberrooms" class="form-select">
                              <option selected value="">Oda Sayısı</option>
                          @foreach($rooms as $number_rooms)
                                    <option value="{{$number_rooms}}">{{$number_rooms}}</option>
                                @endforeach
                          </select>
                                          </div>
                                          <div class="col-md-6">
                                              <label for="town" class="form-label">Kat</label>
                                              <select  name="floorlocation" id="floorlocation" class="form-select">
                            <option selected value="">Kat</option>
                                 <option>0</option>
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                                  <option>11</option>
                                  <option>12</option>
                                  <option>13</option>
                                  <option>14</option>
                                  <option>15</option>
                                  <option>16</option>
                                  <option>17</option>
                                  <option>18</option>
                                  <option>19</option>
                                  <option>20</option>
                                  <option>21</option>
                                  <option>22</option>
                                  <option>23</option>
                                  <option>24</option>
                                  <option>25</option>
                                  <option>30</option>
                          </select>
                                              </div>
                                              <div class="col-md-6">
                                                <label for="city" class="form-label">Min Fiyat</label>
                                                <input type="text" class="form-control" id="minprice" name="minprice" placeholder="Min Fiyat" aria-label="First name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="town" class="form-label">Max Fiyat</label>
                                                    <input type="text" class="form-control" name="maxprice" placeholder="Max Fiyat" aria-label="First name">
                                                    </div>
                                        <div class="col-md-12 d-flex align-items-center justify-content-end" >
                                            <button class="btn learn-more ">
                                                <span class="circle" aria-hidden="true">
                                                  <span class="icon arrow"></span>
                                                </span>
                                                <span class="button-text">Ara</span>
                                              </button>
                                        </div>
                            </form>
                            </div>
                            <div class="col-lg-7 col-12 home-right mt-5">
                              <div class="swiper rowSlider">
                                <div class="swiper-wrapper">
                                  @foreach($adverts as $advert)
                                  <a href="{{ route('ilandetay',$advert) }}" class="swiper-slide">
                                  @foreach($advert->images as $image)
                                      <img src="{{asset('front/images/').'/'.$image->image}}" alt="">
                                    @endforeach
                                      <span class="text-white position-absolute top-0 end-0 p-2 bg-primary rounded">{{ $advert->status }}</span>
                                  </a>
                                  @endforeach
                                </div>
                                <div class="swiper-pagination"></div>
                              </div>
                              <div class="boxes d-flex align-items-center justify-content-around mt-5 flex-wrap">
                                <div class="box">
                                  <img src="{{asset('front/images/dollar.png')}}" alt="">
                                  <div class="box-title">
                                   <span>Dolar</span>
                                  <span class="usd"></span>
                                  </div>
                                </div>
                                <div class="box">
                                <img src="{{asset('front/images/euro.png')}}" alt="">
                                <div class="box-title">
                                 <span>Euro</span>
                                <span class="eur"></span>
                                </div>
                                
                                </div>
                                <div class="box">
                                <img src="{{asset('front/images/pound-sterling.png')}}" alt="">
                                <div class="box-title">
                                <span>Sterlin</span>
                                <span class="sterlin"></span>
                                </div>
                                 
                                </div>
                              </div>
                          </div>
                  
            </section>
            <section class="swipper-container d-flex flex-column">
                <h1 class="title">SON EKLENEN İLANLAR</h1>
                    <div class="swiper mySwiper home-blogs">
                        <div class="swiper-wrapper">
                        @foreach($advertsLast as $advert)
                          <a href="{{ route('ilandetay',$advert) }}" class="swiper-slide  home-blog">
                          @foreach($advert->images as $image)
                            <img src="{{asset('front/images/').'/'.$image->image}}" alt="">
                            <div class="blog-info">
                         
                            <span class="text-white fs-3">{{  $advert->title }}</span>
                            </div>
                           @endforeach
                          </a>
                          @endforeach
                        </div>
                      <!-- Add Arrows -->
    <div class="swiper-button-next swiper-button-black"></div>
    <div class="swiper-button-prev swiper-button-black"></div>
               </div>
            </section>
            <section>
              <h1 class="title">GÜNCEL BLOG YAZILARI</h1>
                <div class="row home-blogs d-flex align-items-center justify-content-center gap-3">
                  @foreach($blogs as $blog)
                  <a href="{{ route('blog',$blog->slug)}}" class="col-md-3 col-10 home-blog p-0">
                      <img src="{{asset('front/images/blog').'/'.$blog->photo}}" alt="">
                      <div class="blog-info d-flex flex-column text-white">
                        <span class="fs-5">{{ $blog->created_at }}</span>
                        <span class="fs-2">{{ $blog->title }}</span>
                      </div>
 
                  </a>
                  @endforeach
                </div>

            </section>
            <section class="container mt-5" id="hakkimizda">
                <div class="row">
                    <div class="col-md-7 col-12 ">
                      <h2>Hakkımızda </h2>
                      {!! $config->text_one  !!}
                      <div class="social-media d-flex align-items-center justify-content-center gap-3">
                            <a href="{{$config->facebook }}" class="btn social-link">
                            <img src="{{ asset('front/images/facebook.png') }}" alt="Facebook" style="width: 25px;">
                            </a>
                            <a href="{{$config->instagram }}" class="btn social-link">
                            <img src="{{ asset('front/images/instagram.png') }}" alt="Instagram" style="width: 25px;">
                            </a>
                            <a href="tel:{{ $config->phone }}" class="btn social-link">
                            <img src="{{ asset('front/images/phone.png') }}" alt="Telefon" style="width: 25px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-5 col-12">
                      
                        {!! $config->map !!}
                       
                    </div>
                </div>
            </section>
            <script
  src="https://code.jquery.com/jquery-3.7.0.slim.min.js"
  integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE="
  crossorigin="anonymous"></script>
            <script>
              let data = fetch("https://finans.truncgil.com/today.json")
.then(response=>response.json())
.then(veri=>{

$(".usd").html(veri["USD"].Alış + " ₺");
$(".eur").html(veri["EUR"].Alış + " ₺");
$(".sterlin").html(veri["GBP"].Alış + " ₺");
});
            </script>
@endsection