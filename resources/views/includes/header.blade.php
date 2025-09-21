<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GM - PROGRESS MONITORING SYSTEM - Headquarter (S.E.C.R.)</title>
        <link rel="icon" href="{{ asset('assets/admin_css/img/indian.png') }}" type="image/x-icon">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('assets/new_shoy/css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('button[onclick="goBack()"]').forEach(btn => {
      btn.style.display = 'none';
    });
  });
</script>
<style>
  button[onclick="goBack()"] {
    display: none !important;
  }
</style>

<style>

thead{
   color: #ffffff !important;
    text-shadow: 1px 1px 0 #000000, 1px 1px 0px rgba(0, 0, 0, 0.4);
    background: #483c35   !important;
}

#map { height: 100vh; width: 100%; }
    .popup-status {
      display: inline-block;
      padding: 3px 6px;
      border-radius: 4px;
      color: white;
      font-size: 0.8em;
      font-weight: bold;
    }
    .status-wip { background: orange; }
    .status-notstarted { background: red; }
    .status-completed { background: green; }

.kavach{
     color:#4e73df;
}
.lte{
    color: #1cc88a;
    
}
.5g{
    color: #003366;
}

main {
   margin-top 25px;
    
}
.testing_lte{
    color: #1cc88a;
}

.testing_5g{
    color:#f39c12;
   
}
.testing_kavach{
    color:#4e73df;  
}
.test_lte{
    border-left: .25rem solid #1cc88a;
}

.test_5g{
    color:#f39c12;
    border-left: .25rem solid #003366;
}

.test_kavach{
    border-left: .25rem solid #003366;
}
</style>
<style>
 .sb-topnav h1 {
    color: #ffffff;
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    margin: 0;
    font-size: 26px;
    white-space: nowrap;
    text-align: center;
    text-shadow: 1px 1px 0 #fff, 2px 2px 6px rgba(0, 0, 0, 0.4);
}

.sb-topnav h1::after {
    color: #ffffff;
    content: "PROGRESS MONITORING SYSTEM - HEADQUARTER (S.E.C.R.)";
    display: block;
    font-size: 15px;
    font-style: italic;
    margin-top: 2px;
    
}

    
    @media (max-width: 1040px) {
        .sb-topnav h1::after {
            display: none;
        }
        .sb-topnav h1 {
            display: none;
            
        }
    }
    
    .navbar-dark .navbar-brand {
    color: #ffffff !important;
}

.sb-topnav.navbar-dark #sidebarToggle {
    color: #ffffff  !important;
}

.navbar-dark .navbar-nav .nav-link {
    color: #ffffff !important;
}

/* global style.css */
body {
  background: #ddebff !important;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
}

</style>
<style>
/* === SIDEBAR BASE === */
.sb-sidenav {
  background: linear-gradient(to bottom, #987b4f, #c49d61, #2b2823);
  padding-top: 1rem;
}

.sb-sidenav .nav-link {
  position: relative;
  display: flex;
  align-items: center;
  color: #ccd6f6;
  padding: 14px 22px;
  font-weight: 500;
  font-size: 15px;
  text-decoration: none;
  border-radius: 8px 8px 0 0;
  margin: 4px 10px;
  overflow: hidden;
  z-index: 1;
  text-shadow: 1px 1px 0 #1a1a1a, 2px 2px 3px rgba(0, 0, 0, 0.4);

  transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

/* === ICON STYLES === */
.sb-sidenav .nav-link i {
  font-size: 18px;
  margin-right: 12px;
  transition: transform 0.3s ease;
  text-shadow: 1px 1px 0 #1a1a1a, 2px 2px 3px rgba(0, 0, 0, 0.4);
}


/* === BOTTOM BORDER EFFECT === */
.sb-sidenav .nav-link::after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 3px;
  background: linear-gradient(to right, #ffffff, #ffffff);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.3s ease-in-out;
}

/* === LEFT STRIP (optional) === */
.sb-sidenav .nav-link::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: linear-gradient(to bottom, #ffffff, #ffffff);
  box-shadow: 0 0 10px #ffffff;
  transform: scaleY(0);
  transition: transform 0.3s ease-in-out;
}

/* === HOVER EFFECT === */
.sb-sidenav .nav-link:hover {
  background: rgba(0, 200, 190, 0.08);
  color: #e3c800;
}

.sb-sidenav .nav-link:hover i {
  transform: scale(1.15);
}

.sb-sidenav .nav-link:hover::after {
  transform: scaleX(1);
}

.sb-sidenav .nav-link:hover::before {
  transform: scaleY(1);
}

/* === ACTIVE LINK SUPPORT (optional) === */
.sb-sidenav .nav-link.active {
  background: rgba(0, 200, 190, 0.15);
  color: #00e3d6;
}

.sb-sidenav .nav-link.active::after,
.sb-sidenav .nav-link.active::before {
  transform: scaleX(1) scaleY(1);
}

/* Default icon style with soft text-shadow */
.sb-sidenav-dark .sb-sidenav-menu .nav-link .sb-nav-link-icon {
    color: rgba(255, 255, 255, 0.25);
    text-shadow: 1px 1px 0 #1a1a1a, 2px 2px 4px rgba(0, 0, 0, 0.4) !important;
    transition: color 0.3s ease, text-shadow 0.3s ease;
}

/* On hover – brighter icon + stronger glow */
.sb-sidenav-dark .sb-sidenav-menu .nav-link:hover .sb-nav-link-icon {
    color: #ffffff;
    text-shadow: 1px 1px 0 #ffffff, 2px 2px 8px rgba(255, 255, 255, 0.5) !important;
}

.sb-sidenav-dark .sb-sidenav-menu .nav-link {
    color: #fff;
}

.sb-sidenav-dark .sb-sidenav-menu .nav-link .sb-nav-link-icon {
    color: #fff !important; }


.collapse {
    visibility: visible !important;
}

.table>thead {
    font-size: 15px !important;
    
}

.table>tbody {
    font-size: 15px !important;
    
}

.sb-nav-fixed #layoutSidenav #layoutSidenav_nav {
  
    height: 100% !important;
}


.sb-nav-fixed #layoutSidenav #layoutSidenav_content {
    padding-left: 225px;
    top: 60px;
}

.sb-sidenav-dark .sb-sidenav-footer {
    border-top: 1px solid #ffffff;
background: linear-gradient(115deg, #5780bf, #5780bf);
    color: #ffffff; /* Optional: enhance text color */
    text-shadow: 1px 1px 0 #000000, 2px 2px 5px rgba(0, 0, 0, 0.5);
    
    font-weight: 500;
    
}


.sb-nav-fixed #layoutSidenav #layoutSidenav_nav .sb-sidenav {
    padding-top: 45px;
}

#sidebarToggle:hover i {
  transform: scale(1.15);
}

#navbarDropdown:hover i {
  transform: scale(1.15);
}










:root{
  --sb-green:#156a3d;
  --sb-green2:#3a9168;
  --sb-active:#ff6f3c;  /* active ka highlight (orange), isko apne hisaab se change kar sakte ho */
}

/* panel background */
#layoutSidenav_nav,
.sb-sidenav-dark{
background: linear-gradient(to bottom, #bbcde5, #bbcde5, #bbcde5);
}

/* section heading */
.sb-sidenav-menu-heading{
  color:#7a7369;
  font-size:.72rem;
  letter-spacing:.12rem;
  font-weight:700;
  text-transform:uppercase;
  margin:10px 16px 6px;
}


/* Sidebar base */
.sb-sidenav .nav-link{
background: linear-gradient(115deg, #5780bf, #5780bf);
  color:#fff;
  margin:8px 12px;
  padding:.85rem .95rem;
  border-radius:14px;
  transition: transform .22s ease, box-shadow .25s ease, background .25s ease;
  box-shadow: inset 0 1px 0 rgba(255,255,255,.25), 0 4px 10px rgba(0,0,0,.15);
}

/* Hover effect */
.sb-sidenav .nav-link:hover{
  transform:translateX(5px);
  box-shadow: inset 0 1px 0 rgba(255,255,255,.35), 0 10px 20px rgba(0,0,0,.2);
  background: linear-gradient(115deg,#483c35,#483c35);
  color:#fff;
}

/* ACTIVE = alag color (orange example) */
.sb-sidenav .nav-link.active{
  background: linear-gradient(115deg, #bbcde5);
  color:#fff !important;
  box-shadow: inset 0 2px 0 rgba(255,255,255,.4), 0 14px 26px rgba(0,0,0,.25);
}

/* Nested items bhi green by default */
.sb-sidenav-menu-nested .nav-link{
  font-size:.9rem;
  margin:4px 16px;
  border-radius:10px;
  background: linear-gradient(115deg, #5780bf, #5780bf);
  color:#fff;
}
.sb-sidenav-menu-nested .nav-link:hover{
  background: linear-gradient(115deg,#483c35,#483c35);
}
.sb-sidenav-menu-nested .nav-link.active{
  background: linear-gradient(115deg, #bbcde5);
}



/* icons */
.sb-nav-link-icon{ width:1.25rem; text-align:center; filter: drop-shadow(0 1px 1px rgba(0,0,0,.15)); }

/* thin subtle divider under groups */
.sb-sidenav-menu .nav + .sb-sidenav-menu-heading{
  margin-top:10px; padding-top:8px; border-top:1px dashed rgba(0,0,0,.06);
}

.sb-sidenav-dark .sb-sidenav-menu .sb-sidenav-menu-heading {
    color: rgb(21 103 59) !important;
}




.sb-sidenav .sb-sidenav-menu .nav .sb-sidenav-menu-heading {
    padding: 0.45rem 1rem 0.15rem;}




    
</style>

<style>
    /* Table borders neat & clear */
    #datatablesSimple {
        border-collapse: collapse !important;
    }

    #datatablesSimple th, 
    #datatablesSimple td {
        border: 1px solid #dee2e6 !important; /* light gray border */
        padding: 8px 12px;
        vertical-align: middle;
    }

    #datatablesSimple th {
        background-color: #5780bf; /* keep your brown header */
        color: #fff;
        text-align: center;
    }

    #datatablesSimple tbody tr:nth-child(even) {
        background-color: #f8f9fa; /* zebra effect */
    }

  
</style>


</head>
<!--<body class="sb-nav-fixed">-->
    <body class="sb-nav-fixed" style="min-height: 100vh;">

<nav class="sb-topnav navbar navbar-expand navbar-dark" style="box-shadow: rgba(0, 0, 0, 0.35) 7px 10px 20px;background: linear-gradient(to right, #5780bf, #5780bf);height: 80px;border-bottom: 1px solid #ffffff;">
<!-- Navbar Brand-->
<!-- Sidebar Toggle-->

<a class="navbar-brand ps-3 flex items-center space-x-2" href="{{route('home')}}">
<!--<img src="{{ asset('assets/admin_css/img/Asset 3@5x.png') }}" alt="Logo" style="width: 75px;">-->
<i>
    <img style="height: 65px; box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4), 4px 4px 12px rgba(0, 0, 0, 0.25);border-radius: 50px;
    background: #ffffff;" src="{{ asset('assets/admin_css/img/indian.png') }}" alt="Logo" />
  </i>
 
<span style="margin-left: -5px; font-weight: bold; color: #ffffff; text-shadow: 1px 1px 0 #fff, 2px 2px 6px rgba(0,0,0,0.4);">
    &nbsp;
    <span style="color: #ffffff; text-shadow: 1px 1px 0 #fff, 2px 2px 6px rgba(0,0,0,0.4);">GM - PMS</span>
  </span>
  
</a>
<button style="
    margin-right: 15px;
    box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.3);
    border: none;
    background: transparent;
    padding: 6px 10px;
    border-radius: 6px;
    transition: all 0.3s ease;
" 
class="btn btn-link btn-sm order-1 order-lg-0 me-lg-0" 
id="sidebarToggle" 
href="#!">
  <i class="fas fa-bars" style="
   
    text-shadow: 1px 1px 0 #000, 2px 2px 4px rgba(0,0,0,0.4);
    font-size: 18px;
    transition: transform 0.3s ease;
  "></i>
</button>

<h1 >
<b> GM - PMS - Headquarter (S.E.C.R.)</b>
</h1>


<!-- Navbar Search-->
<!-- Navbar Search-->
<form action="" method="GET" class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
<!--<div class="input-group">
<input class="form-control" type="search" name="q" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
<button class="btn" style="color: #fff;
background-color: #083785;
border-color: #083785;" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
</div>-->
</form>
            
    
<!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle"
        id="navbarDropdown"
        href="#"
        role="button"
        data-bs-toggle="dropdown"
        aria-expanded="false"
        style="box-shadow: 2px 2px 6px rgba(0,0,0,0.3); border-radius: 6px; padding: 6px 10px; transition: all 0.3s ease;">
       <i class="fas fa-user fa-fw" style="text-shadow: 1px 1px 0 #000, 2px 2px 4px rgba(0,0,0,0.4); transition: transform 0.3s ease;"></i>
     </a>
     
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
   
    <li><a class="dropdown-item" href="">Profile</a></li>
    <li><hr class="dropdown-divider" /></li>
    <li>
      <form id="logout-form" action="" method="POST" style="display: none;">
        @csrf
    </form>
    
    <button type="button" class="dropdown-item text-danger" onclick="confirmLogout()">
        Logout
    </button>
    
</li>
    
    <!-- <li><a class="dropdown-item" href="">Admin Login</a></li> -->
   
    </ul>
    </li>
    </ul>
</nav>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function confirmLogout() {
      Swal.fire({
          title: 'Are you sure?',
          text: "You want to logout!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#d33',
          cancelButtonColor: '#3085d6',
          confirmButtonText: 'Yes, logout!'
      }).then((result) => {
          if (result.isConfirmed) {
              document.getElementById('logout-form').submit();
          }
      });
  }
</script>

<div id="layoutSidenav">
<div id="layoutSidenav_nav">
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
<div class="sb-sidenav-menu">
<div class="nav">
<div class="sb-sidenav-menu-heading"></div> 

<!-- <div class="sb-sidenav-menu-heading">Menus</div> -->
<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} mt-4" href="{{ route('home') }}">
  <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
  Dashboard
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
   data-bs-target="#collapseReports" aria-expanded="false" aria-controls="collapseReports">
  <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
  Projects
  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapseReports" data-bs-parent="#sidenavAccordion">
  <nav class="sb-sidenav-menu-nested nav">

  <a class="nav-link" href="{{ route('create_new_project') }}">
    <i class="fas fa-folder-open me-2"></i>KAVACH Works
  </a>

  </nav>
</div>


<!-- <a class="nav-link {{ request()->routeIs('user_details') ? 'active' : '' }}" href="{{ route('user_details') }}">
  <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
  User Entry
</a> -->





<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseManage" aria-expanded="false" aria-controls="collapseManage">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    Update Data
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>

<div class="collapse" id="collapseManage" aria-labelledby="headingManage" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionManage">
    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#manageBlog" aria-expanded="false" aria-controls="manageBlog">
     NGP-JSG
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
    </a>
    <div class="collapse" id="manageBlog" aria-labelledby="headingBlog" data-bs-parent="#sidenavAccordionManage">
    <nav class="sb-sidenav-menu-nested nav">
    <a class="nav-link {{ request()->routeIs('user_details') ? 'active' : '' }}" href="{{ route('user_details') }}">Preparatory</a>
     <a class="nav-link" href="">Section Target</a>
      <a class="nav-link" href="">Tender</a>
       <a class="nav-link" href="">Training</a>
        <a class="nav-link" href="">Loco</a>
        <a class="nav-link" href="{{route('ei_works')}}">EI Works</a>
        <a class="nav-link" href="{{route('auto_signal_project')}}">Auto Signalling</a>
    </nav>
    </div>
   
    </nav>
    </div>


                        </div>
                    </div>
  <div class="sb-sidenav-footer">
  <div class="small">Logged in as:</div>
  {{ auth()->user()->name }}
</div>



                </nav>
            </div>
           
<!-- Global Page Loader -->
<div id="pageLoader" class="position-fixed top-50 start-50 translate-middle text-center"
     style="z-index:2000; background:rgba(255,255,255,0.8); width:100%; height:100%; display:flex; align-items:center; justify-content:center;">
  <div class="p-4 bg-dark text-white rounded-3 shadow-lg d-flex align-items-center">
    <div class="spinner-border spinner-border-sm me-2" role="status"></div>
    <span>Loading… please wait</span>
  </div>
</div>
<style>
  #pageLoader {
    transition: opacity 0.3s ease, visibility 0.3s ease;
  }
  #pageLoader.hidden {
    opacity: 0;
    visibility: hidden;
  }
</style>
<script>
  window.addEventListener("load", function () {
    const loader = document.getElementById("pageLoader");
    if (loader) {
      loader.classList.add("hidden");
      setTimeout(() => loader.style.display = "none", 300); // hide after animation
    }
  });
</script>
