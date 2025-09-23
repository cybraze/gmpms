




@include('includes.header')
 <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- AOS for form animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">


<script>
  AOS.init();
</script>
<style>
    .text-white {
    color: #cfbc71 !important;
    text-shadow: 1px 1px 0 #000000, 2px 2px 4px rgba(0, 0, 0, 0.4);
}


.form-label {
  text-shadow: 1px 1px 0 #ffffff, 2px 2px 4px rgba(0, 0, 0, 0.3);
}

.form-control{
    border-radius: 1.25rem;
}

/* Apply to whole row or cells for subtle text-shadow */
table tbody tr td {
  text-shadow: 1px 1px 0 #fff, 2px 2px 4px rgba(0, 0, 0, 0.3);
}

/* View Button */
.custom-view-btn {
  border: 1px solid #0d6efd;
  color: #0d6efd;
  background-color: #e9f2ff;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.custom-view-btn:hover {
  background-color: #0d6efd;
  color: #fff;
}

/* Download Button */
.custom-download-btn {
  border: 1px solid #198754;
  color: #198754;
  background-color: #e9f8f0;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.custom-download-btn:hover {
  background-color: #198754;
  color: #fff;
}




.dashboard-card {
  display: flex;
  align-items: center;
  gap: 15px;
  padding: 20px 20px 20px 24px;
  border-radius: 1.25rem;
  color: #fff;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease;
  cursor: pointer;
  position: relative;
  border-left: 6px solid transparent;
}

.dashboard-card:hover {
  transform: translateY(-6px) scale(1.01);
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
  filter: brightness(1.05);
}

/* Icon Box */
.icon-box {
  background: rgba(255, 255, 255, 0.15);
  padding: 14px;
  border-radius: 25%;
  font-size: 22px;
  box-shadow: inset 2px 2px 5px rgba(0,0,0,0.2), inset -2px -2px 6px rgba(255,255,255,0.1);
  text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
}

/* Text Styles */
.card-title {
  margin: 0;
  font-size: 14px;
  font-weight: 500;
  text-transform: uppercase;
  opacity: 0.9;
}

.card-count {
  margin: 0;
  font-size: 28px;
  font-weight: 700;
  text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

/* Card Colors with Left Borders */
.card-purple {
  background: linear-gradient(135deg, #6f42c1, #4a2a91);
  border-left: 6px solid #c79ef7;
}

.card-blue {
  background: linear-gradient(135deg, #0d6efd, #084298);
  border-left: 6px solid #66c2ff;
}

.card-green {
  background: linear-gradient(135deg, #198754, #145c32);
  border-left: 6px solid #72e3b2;
}

.card-orange {
  background: linear-gradient(135deg, #fd7e14, #c75b05);
  border-left: 6px solid #ffc187;
}

.card-red {
  background: linear-gradient(135deg, #ff4b2b, #b31217);
  border-left: 6px solid #ff9a8b;
}
/* Canvas and card styling for 3D feel */
canvas {
  background: #fff;
  border-radius: 1.5rem !important;
  box-shadow:
    inset 1px 1px 4px rgba(0, 0, 0, 0.06),
    4px 4px 14px rgba(0, 0, 0, 0.18);
  padding: 1rem;
}

/* Card Heading Styles */
.card h5 {
  font-weight: 700;
  color: #2d2d2d;
  text-shadow: 1px 1px 0 #fff, 2px 2px 6px rgba(0,0,0,0.3);
}

/* Count style inside chart headings, if needed */
.card h2 {
  text-shadow: 1px 1px 0 #ffffff, 2px 2px 6px rgba(0, 0, 0, 0.3);
}


</style>
<div id="layoutSidenav_content">
    <main>







        <div class="container-fluid px-4 mt-5 mb-5">
<!-- 🔁 Auto Carousel inside the same container -->
<div id="dashCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000" data-bs-pause="false">
  <div class="carousel-inner">

    <!-- SLIDE 1: YOUR CURRENT DASHBOARD CONTENT -->
    <div class="carousel-item active">
      <div class="row g-4">



<div class="col-md-6 col-xl-3">
  <a href="{{ route('object_details', $project->id) }}" 
     class="text-decoration-none text-dark">
    <div class="dashboard-card card-purple">
      <div class="icon-box"><i class="bi bi-file-earmark-check-fill"></i></div>
      <div><h5 class="card-title">Preparatory Works</h5></div>
    </div>
  </a>
</div>

<div class="col-md-6 col-xl-3">
  <a href="{{ route('section_target_details', $project->id) }}" 
     class="text-decoration-none text-dark">
    <div class="dashboard-card card-blue">
      <div class="icon-box"><i class="bi bi-file-earmark-check-fill"></i></div>
      <div><h5 class="card-title">Section Target</h5></div>
    </div>
  </a>
</div>
<div class="col-md-6 col-xl-3">
  <a href="{{ route('loco_kavach_details', $project->id) }}" 
     class="text-decoration-none text-dark">
    <div class="dashboard-card card-orange">
      <div class="icon-box"><i class="bi bi-file-earmark-check-fill"></i></div>
      <div><h5 class="card-title">Loco</h5></div>
    </div>
  </a>
</div>
<div class="col-md-6 col-xl-3">
  <a href="{{ route('training_section_details', $project->id) }}" 
     class="text-decoration-none text-dark">
    <div class="dashboard-card card-green">
      <div class="icon-box"><i class="bi bi-file-earmark-check-fill"></i></div>
      <div><h5 class="card-title">Training</h5></div>
    </div>
  </a>
</div>


<div class="col-md-6 col-xl-3">
  <a href="{{ route('tender_status_details', $project->id) }}" 
     class="text-decoration-none text-dark">
    <div class="dashboard-card card-green">
      <div class="icon-box"><i class="bi bi-file-earmark-check-fill"></i></div>
      <div><h5 class="card-title">Tender Status</h5></div>
    </div>
  </a>
</div>

















      </div>
    </div>




  </div>


</div>
  
</div>





            
              
          </div>
          
          
          
          
          
          

     </div>
          
 

@include('includes.footer')