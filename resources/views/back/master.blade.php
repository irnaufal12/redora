<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/assets/vendors/simple-datatables/style.css">
    
    <link rel="stylesheet" href="/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/new.css">
    <link rel="shortcut icon" href="/assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="{{route('admin-index')}}"><img src="/assets/images/logo/redora.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Tables</li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-prosedur-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Prosedur</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-syarat-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Syarat</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-manfaat-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Manfaat</span>
                            </a>
                        </li>

                        {{-- <li class="sidebar-item  ">
                            <a href="{{route('admin-jadwal-event-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table Jadwal Event</span>
                            </a>
                        </li> --}}

                        {{-- <li class="sidebar-item  ">
                            <a href="{{route('admin-lokasi-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table Lokasi Donor</span>
                            </a>
                        </li> --}}

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-faq-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>FAQ</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="{{route('admin-pertanyaan-index')}}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Pertanyaan User</span>
                            </a>
                        </li>

                        <li class="sidebar-title"><a href="{{route('admin-logout')}}" onclick="event.preventDefault();document.
                            getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right">Logout</i></a>
                            <form action="{{route('admin-logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            @yield('content')

            {{-- <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>

    <script src="/assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="/assets/js/main.js"></script>
    @yield('footer')
</body>

</html>