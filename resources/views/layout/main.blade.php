<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>{{ $title }}</title>
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../../assets/img/favicon/logo.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../../assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="../../../assets/vendor/fonts/fontawesome.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../../assets/vendor/libs/flatpickr/flatpickr.css" />
    <link rel="stylesheet" href="../../../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.css" />



    <link rel="stylesheet" href="../../../assets/vendor/libs/apex-charts/apex-charts.css" />
    <!-- Page CSS -->

    <!-- Helpers -->

    <script src="../../../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../../../assets/js/config.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.css"/>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <div class="app-brand-link">
              <span class="app-brand-logo demo">
                <img src="../../../assets/img/favicon/logo.ico" alt="logo" width="25">
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize; font-family: 'Script MT'; color: #54ab00;">Siakas</span>
            </div>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home"></i>
                <div data-i18n="Analytics">Beranda</div>
              </a>
            </li>
            
            {{-- <li class="menu-item {{ $active == 'data-siswa' ? 'active' : '' }}"> --}}
              {{-- <a href="{{ route('bendahara/data/siswa') }}" class="menu-link"> --}}
                <i class="menu-icon tf-icons bx bxs-user-detail"></i>
                <div data-i18n="Analytics">Data Siswa</div>
              </a>
            </li>
            {{-- <li class="menu-item {{ $active == 'data-guru' ? 'active' : '' }}"> --}}
              {{-- <a href="{{ route('bendahara/data/guru') }}" class="menu-link"> --}}
                <i class="menu-icon tf-icons bx bx-user-check"></i>
                <div data-i18n="Analytics">Data Guru</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="#" class="menu-link">
                <i class="menu-icon tf-icons bx bx-donate-heart"></i>
                <div data-i18n="Analytics">Data Jenis Transaksi</div>
              </a>
            </li>
            {{-- <li class="menu-item {{ $active == 'pendaftaran' ? 'active' : '' }}"> --}}
              {{-- <a href="{{ route('bendahara/pendaftaran/siswa') }}" class="menu-link"> --}}
                <i class="menu-icon tf-icons bx bx-book-add"></i>
                <div data-i18n="Analytics">Pendaftaran</div>
              </a>
            </li>
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                    <i class="bx bx-menu bx-sm"></i>
                </a>
            </div>
        
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                <ul class="navbar-nav flex-row align-items-center ms-auto">
                    <li class="nav-item navbar-dropdown dropdown-user dropdown">
                        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                            <div class="avatar avatar-online">
                              @if (Auth::user()->image)
                              <img src="{{ url('storage/foto_profil/'.$foto_profil) }}" alt class="w-px-40 h-auto rounded-circle" />
                              @else
                              <img src="{{ url('images/user-default.jpg'.$foto_profil) }}" alt="w-px-40 h-auto rounded-circle">                              
                              @endif
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar avatar-online">
                                              @if (Auth::user()->image)
                                              <img src="{{ url('storage/foto_profil/'.$foto_profil) }}" alt class="w-px-40 h-auto rounded-circle" />
                                              @else
                                              <img src="{{ url('images/user-default.jpg'.$foto_profil) }}" alt="w-px-40 h-auto rounded-circle">                              
                                              @endif
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 align-self-center">
                                            <span class="fw-semibold d-block">{{ auth()->user()->username }}</span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="bx bx-user me-2"></i>
                                    <span class="align-middle">Profil</span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bx bx-power-off me-2"></i>
                                    <span class="align-middle" style="cursor: pointer;">Keluar</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                               </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
          <!-- Navbar -->
       
         @yield('content')
         
          <!-- Footer Start -->
    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
      <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          ©
          <script>
            document.write(new Date().getFullYear());
          </script>
          , SIAKAS - AMANDA SALVA BALESTA
        </div>
      </div>
    </footer>
    <!-- / Footer -->
    
    <div class="content-backdrop fade"></div>
  </div>
  <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../../../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../../../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>

    <script src="../../../assets/vendor/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
    <script src="../../../assets/vendor/libs/flatpickr/flatpickr.js"></script>


    {{-- <script type="text/javascript">
      $(document).ready( function () {
        $('#myTable').DataTable(
        );
      });
    </script>

    <script>
      $("#bs-datepicker-format").datepicker({ format: "dd/mm/yyyy" });
    </script> --}}


  </body>
</html>

