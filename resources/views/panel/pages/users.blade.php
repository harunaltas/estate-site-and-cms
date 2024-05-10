@extends('panel.layouts.master')
@section('title','Kullanıcılar')
@section('screen')
<div class="container-fluid p-0 m-0 py-2">
                <!-- start: Summary -->

                <div class="row g-3">
                    <div class="col-12">
                        <div class="datatable bg-light p-4 shadow">
                            <div class="datatable-inputs d-flex justify-content-between w-100 mb-3">
                                <div class="buttons d-flex gap-2">
                                    <button class="newBtn d-flex align-items-center justify-content-center" data-bs-toggle="modal" data-bs-target="#modalkartkayit">
                                        <span class="icon">
                                            <i class="ri-add-line"></i>
                                        </span>
                                        <span>
                                            YENİ KAYIT
                                        </span>
                                        </button>
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
                                        <th>Kullanıcı Adı</th>
                                        <th>Email</th>
                                        <th>Tipi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ($user->type == "admin") ? 'Admin' : 'Moderatör' }}</td>
                                        <td>
                                            <div class="process-buttons d-flex align-items-center justify-content-center gap-2">
                                                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
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
                              <h1 class="modal-title fs-5" id="exampleModalLabel">Kullanıcı Kaydı</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="row g-3" method="POST" action="{{ route('admin.users.store') }}">
                                @csrf
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 mt-2">
                                                <label for="username" class="form-label">Kullanıcı Adı</label>
                                                <input type="text" class="form-control" id="username" name="username">
                                              </div>
                                              <div class="col-md-12 mt-2">
                                                <label for="name" class="form-label">Ad Soyad</label>
                                                <input type="text" class="form-control" id="name" name="name">
                                              </div>
                                              <div class="col-md-12 mt-2">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email">
                                              </div>
                                              <div class="col-md-12 mt-2">
                                                <label for="password" class="form-label">Şifre</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                              </div>
                                              <div class="col-md-12 mt-2">
                                                <label for="type" class="form-label">Tipi</label>
                                                <select id="type" name="type" class="form-select">
                                                  <option selected value="admin">Admin</option>
                                                  <option value="mod">Moderatör</option>
                                                </select>
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
