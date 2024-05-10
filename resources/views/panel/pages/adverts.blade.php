@extends('panel.layouts.master')
@section('title','İlanlar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->
                <div class="row g-3 mb-4 d-flex align-items-center justify-content-start text-white">
                   <div class="col-2">
                     <div class="box d-flex flex-column p-3 rounded shadow">
                        <span>İlan Sayısı</span>
                        <span class="fs-2 text-dark">{{ $adverts->count() }}</span>
                     </div>
                   </div>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <div class="datatable bg-light p-4 shadow">
                            <div class="datatable-inputs d-flex justify-content-between w-100 mb-3">
                                <div class="buttons d-flex gap-2">
                                    <a href="{{ route('admin.adverts.create') }}" class="btn newBtn d-flex align-items-center justify-content-center">
                                        <span class="icon">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span>
                                            YENİ KAYIT
                                        </span>
                                        </a>
                                </div>
                                <!--
                                 <div class="searchInput d-flex align-items-center justify-content-center" >
                                    <span class="pe-2">ARA :</span>
                                    <input type="search" name="" id="filterbox">
                                </div>

                                -->
                             
                            </div>
                      
                            <table id="datatable" class="table table-striped dtable cust-datatable no-footer" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Durum</th>
                                        <th>Tipi</th>
                                        <th>İlan Başlığı</th>
                                        <th>İl</th>
                                        <th>İlçe</th>
                                        <th>Açık Adres</th>
                                        <th>Fiyat</th>
                                        <th>Oda Sayısı</th>
                                        <th>M'2</th>
                                        <th>Bina Yaşı</th>
                                        <th>Kat</th>
                                        <th>Eşyalı</th>
                                        <th>Ödeme Şekli</th>
                                        <th>Açıklama</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
          
                                    @foreach($adverts as $advert)
                                    <?php
                                                           $limit = 22;
                                                           $titleuzunluk = strlen($advert->title);
                                                           $descuzunluk = strlen($advert->description);
                                                           $addressuzunluk = strlen($advert->address);
                                                              if ($titleuzunluk > $limit) { 
                                                                  $title = substr($advert->title,0,$limit)."...";
                                                                 }
                                                                 else {
                                                                   $title = $advert->title;
                                                                 }     
                                                                 if ($descuzunluk > $limit) { 
                                                                    $desc = substr($advert->description,0,$limit)."...";
                                                                   }
                                                                   else {
                                                                     $desc = $advert->description;
                                                                   }   
                                                                   if ($addressuzunluk > $limit) { 
                                                                    $address = substr($advert->address,0,$limit)."...";
                                                                   }
                                                                   else {
                                                                     $address = $advert->address;
                                                                   }             
                                    ?>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><button    class="btn badge {{  ($advert->status == 'Satılık') ? ' text-bg-warning ' : 'text-bg-info' }}" >{{ $advert->status }}</button> </td>
                                        <td>{{ $advert->type }}</td>
                                        <td>{{ $title }}</td>
                                        <td>{{ $advert->city }}</td>
                                        <td>{{ $advert->town }}</td>
                                        <td>{{ $address }}</td>
                                        <td>{{ number_format($advert->price) }} &pound</td>
                                        <td>{{ $advert->number_rooms }}</td>
                                        <td>{{ $advert->squaremeters }}</td>
                                        <td>{{ $advert->buildingage }}</td>
                                        <td>{{ $advert->floorlocation }}</td>
                                        <td>{{ $advert->isItem }}</td>
                                        <td>{{ $advert->payment_methods }}</td>
                                        <td>{{ $desc }}</td>
                                        <td>
                                            <div class="process-buttons d-flex align-items-center justify-content-center gap-2">
                                        
                                                <form action="{{ route('admin.adverts.edit',$advert) }}" method="GET">
                                  
                                                          <button class="btn"><i class="ri-edit-box-line"></i></button>
                                                 </form> 
                                                 <form action="{{ route('admin.adverts.destroy',$advert) }}" method="POST">
                                                          @method('DELETE')
                                                          @csrf
                                                          <button type="submit" class="btn" onClick="return confirm('Silmek İstediğinize Emin misiniz ?')"><i class="ri-delete-bin-line"></i> </button>   
                                                 </form>   

                                              
                                            </div>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    <div class="modal fade" id="modalkartkayit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Araç Kaydı</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" method="POST" action="{{ route('admin.adverts.store') }}">
                                @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label for="plaka" class="form-label">Araç Plaka</label>
                                                <input type="text" class="form-control" id="plaka" name="plaka">
                                              </div>
                                        </div>
                                    </div>
                                
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">İptal</button>
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                 </div>
                                  </form>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                <!-- end: Summary -->
            </div>
@endsection
