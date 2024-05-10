@extends('front.layouts.master')
@section('page')
<div class="container adverts-container">
            <h1 class="title">İLANLAR</h1>
                  <form action="" method="get" >
                    <div class="row g-3">
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="searchkey" placeholder="Aranacak Kelimeyi Giriniz.:." >
                    </div>
                    <div class="col-md-2">
                      <select id="type" name="type" class="form-select">
                      <option selected value="">Konut Tipi</option>
                      @foreach($types as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                      </select>
                    </div>
                    <div class="col-md-2">
                      <select id="inputState" class="form-select">
                        <option selected value="">Durumu</option>
                        <option>Kiralık</option>
                        <option>Satılık</option>
                      </select>
                    </div>
                    <div class="col-md-2 col-6">
                      <a class="btn btn-secondary form-control" id="filterdetailsbutton">DETAYLI FİLTRELE</a>
                    </div>
                    <div class="col-md-1 col-6">
                    <button type="submit" class="btn btn-warning form-control">Filtrele</button>
                  </div>
                </div>
                    <div class="row form-details" id="filterdetails">
                      <div class="col-md-2"> 
                        <select id="city" name="city" class="form-select">
                          <option selected value="">Şehir...</option>
                          <option>...</option>
                        </select>
                      </div>
                      <div class="col-md-2">
                      <select class="form-select" name="town" id="town" >
                                        <option>Lefkoşa</option>
                                        <option>Girne</option>
                                        <option>Gazimağusa</option>
                                        <option>Lefke</option>
                                        <option>Güzelyurt</option>
                                        <option>İskele</option>
                                       </select>
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" id="minprice" name="minprice" placeholder="Min Fiyat" aria-label="First name">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" name="maxprice" placeholder="Max Fiyat" aria-label="First name">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" name="minsquaremeters" placeholder="Max Alan" aria-label="First name">
                      </div>
                      <div class="col-md-2">
                        <input type="text" class="form-control" name="maxsquaremeters" placeholder="Max Alan" aria-label="First name">
                      </div>
                    
                        <div class="col-md-2 mt-2">
                          <select name="buildingage" id="buildingage" class="form-select">
                            <option selected value="">Bina Yaşı</option>
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
                        <div class="col-md-2 mt-2">
                          <select id="numberrooms" name="numberrooms" class="form-select">
                              <option selected value="">Oda Sayısı</option>
                          @foreach($rooms as $number_rooms)
                                    <option value="{{$number_rooms}}">{{$number_rooms}}</option>
                                @endforeach
                          </select>
                        </div>
                        <div class="col-md-2 mt-2">
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
                        <div class="col-md-2 mt-2">
                                <select name="paymentmethods" id="paymentmethods" class="form-control">
                                   <option value="">Ödeme Şekli</option>
                                    @foreach($paymentMethods as $paymentMethod)
                                    <option value="{{$paymentMethod}}">{{$paymentMethod}}</option>
                                    @endforeach
                                </select>
                              </div>
                    

                    </div>

                 
                  </form>


                    <div class="row mt-3">
                    @foreach($adverts as $advert)
                      <a href="{{ route('ilandetay',$advert) }}" class="col-lg-3 col-md-6 advert p-1" >
                        <div class="img-details d-flex align-items-center">
                          <span class="type">{{ $advert->type }}</span>
                          <span class="type">{{ $advert->status }}</span>
                        </div>

                        <div class="advert-img">
                        @foreach($advert->images as $image)
                          <img src="{{asset('front/images').'/'.$image->image}}" alt="">
                          @endforeach
                          <div class="advert_price">{{ number_format($advert->price) }} &pound</div>
                        </div>
                        <?php
                        $titlelimit = 50;
                        $titleuzunluk = strlen($advert->title);
                           if ($titleuzunluk > $titlelimit) { 
                               $title = substr($advert->title,0,$titlelimit)."...";
                              }
                              else {
                                $title = $advert->title;
                              }
                              $desclimit = 50;
                              $descuzunluk = strlen($advert->description);
                                 if ($descuzunluk > $desclimit) { 
                                     $description = substr($advert->description,0,$desclimit)."...";
                                    }
                                    else {
                                      $description = $advert->description;
                                    }      
                   
                        ?>
                        <div class="advert-color-container">
                          <div class="d-flex flex-column ps-3">
                            <span class="fw-bold fs-5">{{ $title }}</span>
                            <span class="advert_address ">{{$description}}</span>
                          </div>


                          <div class="details d-flex flex-column">
                         
                            <div class="advert_details d-flex align-items-center justify-content-between">
                           
                              <span class="advert_detail">
                              <i class="fa-regular fa-building"></i>
                              {{ $advert->town }}
                             
                            </span>
                            <span class="advert_detail">
                           {{ $advert->squaremeters }} m<sup>2</sup>
                          </span>
                           <span class="advert_detail">
                           {{ $advert->floorlocation }}
                         </span>
                            </div>

                          </div>

                        </div>
                    </a>
                    @endforeach

              
                    </div>
                    <div class="row">
                      <div class="col-12 d-flex justify-content-center mt-3">
                          {!! $adverts->links() !!}
                      </div>
                    </div>
                </div>
@endsection

