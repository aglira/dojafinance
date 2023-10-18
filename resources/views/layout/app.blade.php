<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stlesheet" href="/fontawesome-free-6.2.1-web/css/all.css">

</head>
<body>
    <div class="nav container-fluid">
        <div class="row flex-nowrap">
            <div class="background col-auto col-md-4 min-vh-100">
                <div class="background">
                    <a class="d-flex text-decoration-none text-white">
                        <img src={{('logo2.png')}} style="width: 83px; height: 83px;">
                        <span class="fs-4 d-none d-sm-inline align-items-center">Doja Finance</span>
                    </a>
                    <ul class="nav nav-pills flex-coloumn mt -4">
                        <li class="nav-item">
                            <a href="{{ url('dashboard', []) }}" class="nav-link text-white">
                                <img src="home.svg" style="width: 27px; height: 30px; color:#d1b3b3"><span class="fs-4 ms-3  d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('pemasukan', []) }}" class="nav-link text-white">
                                <img src={{('pemasukan.png')}} style="width: 27px; height: 30px;"></i><span class="fs-4 ms-3 d-none d-sm-inline">Pemasukan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <img src={{('pengeluaran.png')}} style="width: 27px; height: 30px;"><span class="fs-4 ms-3 d-none d-sm-inline">Pengeluaran</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-white">
                                <img src={{('anggota.png')}} style="width: 27px; height: 30px;"><span class="fs-4 ms-3 d-none d-sm-inline">Data Anggota</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
    </div>
    <script src="./Bootstrap/js/bootstrap.bundle.js"></script>
    <style>
      body {
        background-color: #48D1CC;
      }
    .background{
        background-color: #E9967A;
    }
    .nav-pills li a:hover{
        background-color: #;
    }
    </style>
    
    <div class="container content">
      @yield('content')
    </div>

  </body>
</html>