<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $config->title.' '.$config->subtitle }}</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{asset('front/css/')}}/style.css">
    <link rel="shortcut icon" href="{{asset('front/images/favicon.ico')}}" type="image/x-icon">
</head>
@if($config->image != "" || $config->image != null)
<body style="background-image:url({{asset('front/images').'/'.$config->image}})">
@else
<body style="background-image: var(--bgImage);"> 
@endif

    <div class="main" id="main">
    <header>
        <nav class="navbar navbar-expand-lg">
          <div class="container-fluid px-5">
            <a class="navbar-brand" href="#"><span>{{ $config->title }}</span><span>{{ $config->subtitle }}</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="{{ route('/') }}">Anasayfa</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('ilanlar') }}">İlanlar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#hakkimizda">Hakkımızda</a>
                  </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bloglar')}}">Blog</a>
                  </li>
              </ul>
            </div>
            <div class="header-contact theme-container">
                            
                <input onchange="toggleDarkMode()"  type="checkbox" id="dark-mode">
                <label for="dark-mode"></label>
            </div>
          </div>
        </nav>
      </header>
      <div class="container-fluid content" id="layout-content">
              @yield('page')
        </div>
           </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->


  <script src="{{asset('front/js/')}}/script.js"></script>
  <script src="{{asset('front/js/')}}/darkmode.js"></script>
  <script src="{{asset('front/js/')}}/scroll.js"></script>
  <script src="{{asset('front/js/')}}/swipper.js"></script>
  <script src="{{asset('front/js/')}}/filterdetailsbtn.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> 
</body>
</html>






