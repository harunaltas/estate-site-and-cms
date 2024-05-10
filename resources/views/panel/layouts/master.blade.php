<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- start: Icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.1/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('back/css/')}}/style.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
    <!-- end: CSS -->
    <title>@yield('title') | Kavi Emlak</title>
</head>

<body>

    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end ">
        <div class="d-flex align-items-center p-3">
            <a href="#" class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4">Kavi</a>
            <i class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"></i>
        </div>
      
        <ul class="sidebar-menu p-3 m-0 mb-0">
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Yönetim</li>
            <li class="sidebar-menu-item @if(Request::segment(1)=='') active @endif" >
                <a href="{{ route('admin.adverts.index') }}">
                <img src="{{asset('back/img')}}/record.png"  class="sidebar-menu-item-icon"  alt="">
                    İlanlar
                </a>
            </li>
            <li class="sidebar-menu-item @if(Request::segment(1)=='') active @endif" >
                <a href="{{ route('admin.blogs.index') }}">
                <img src="{{asset('back/img')}}/record.png"  class="sidebar-menu-item-icon"  alt="">
                    Bloglar
                </a>
            </li>
            <li class="sidebar-menu-item @if(Request::segment(1)=='states') active @endif">
                <a href="{{ route('admin.users.index') }}">
                <img src="{{asset('back/img')}}/record.png"  class="sidebar-menu-item-icon"  alt="">
                    Kullanıcılar
                </a>

            </li>
            <li class="sidebar-menu-item @if(Request::segment(1)=='card') active @endif">
                <a href="{{ route('admin.siteconfigs') }}">
                <img src="{{asset('back/img')}}/record.png"  class="sidebar-menu-item-icon"  alt="">
                    Site Ayarları
                </a>

            </li>
            <li class="sidebar-menu-item @if(Request::segment(1)=='card') active @endif">
                <a href="{{ route('ilanlar') }}">
                <img src="{{asset('back/img')}}/record.png"  class="sidebar-menu-item-icon"  alt="">
                    Siteyi Görüntüle
                </a>

            </li>


        </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
        <div class="p-2">
            <!-- start: Navbar -->
            <nav class="px-3 py-2 bg-white rounded shadow">
                <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
                <h5 class="fw-bold mb-0 me-auto">@yield('title')</h5>

                <div class="dropdown">
                    <div class="d-flex align-items-center cursor-pointer dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-2 d-none d-sm-block">{{ auth()->user()->name }}</span>
                        <img class="navbar-profile-image" src="{{asset('back/img')}}/user.png" alt="Image">
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="">Profil</a></li>
                      <li>
                        </li>
                        <li>
                         <a href="{{ route('logoutHandle') }}" class="dropdown-item">
                                        ÇIKIŞ YAP

                            </a>
                        </li>
                  

                    </ul>
                </div>
            </nav>
            <!-- end: Navbar -->
            @if (session('success'))  
                    <div class="alert alert-success mt-2">
                    {{ session('success') }}        
                     </div>
                @endif
                @if (session('error'))  
                    <div class="alert alert-danger mt-2">
                    {{ session('error') }}        
                     </div>
                @endif

                    @yield('screen')
        </div>
    </main>
    <!-- end: Main -->
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#hakkimizda' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
    <!-- start: JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.3.1/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <script src="{{asset('back/js/')}}/datatable.js"></script>
    <script src="{{asset('back/js/')}}/script.js"></script>


        @yield('js')
    <!-- end: JS -->
</body>

</html>