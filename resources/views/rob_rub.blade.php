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
<div class="col-12">
    <h4 class="fw-bold text-uppercase d-flex align-items-center" 
        style="color:#2c3e50; letter-spacing:1px;">
      <i class="bi bi-speedometer2 me-2 text-primary"></i> 
      SECR Work Dashboard
    </h4>
  </div>
      <!-- Approved Contracts -->
<div class="col-md-6 col-xl-3">
  <a href="#" class="text-decoration-none text-dark">
    <div class="dashboard-card card-purple text-center">
      <div class="icon-box"><i class="bi bi-graph-up-arrow"></i></div>
      <div>
        <h6 class="card-title mb-1" style="text-align:left;">Total RKM <br>Target 2024-2025</h6>
        <h4 class="fw-bold text-light" style="text-align:left;">245</h4>
      </div>
    </div>
  </a>
</div>


<div class="col-md-6 col-xl-3">
  <a href="#" class="text-decoration-none text-dark">
    <div class="dashboard-card card-blue text-center">
      <div class="icon-box"><i class="bi bi-alarm-fill"></i></div>
      <div>
        <h6 class="card-title mb-1" style="text-align:left;">Total RKM <br>Commissioned insl spillover</h6>
        <h4 class="fw-bold text-light" style="text-align:left;">65</h4>
      </div>
    </div>
  </a>
</div>

<div class="col-md-6 col-xl-3">
  <a href="#" class="text-decoration-none text-dark">
    <div class="dashboard-card card-green text-center">
      <div class="icon-box"><i class="bi bi-alarm-fill"></i></div>
      <div>
        <h6 class="card-title mb-1" style="text-align:left;">Total RKM <br>Where FAT Completed</h6>
        <h4 class="fw-bold text-light" style="text-align:left;">245</h4>
      </div>
    </div>
  </a>
</div>

<div class="col-md-6 col-xl-3">
  <a href="#" class="text-decoration-none text-dark">
    <div class="dashboard-card card-orange text-center">
      <div class="icon-box"><i class="bi bi-alarm-fill"></i></div>
      <div>
        <h6 class="card-title mb-1" style="text-align:left;">Total RKM <br>Where SAT Completed</h6>
        <h4 class="fw-bold text-light" style="text-align:left;">20</h4>
      </div>
    </div>
  </a>
</div>

<!-- <div class="col-md-6 col-xl-3">
  <a href="#" class="text-decoration-none text-dark">
    <div class="dashboard-card card-red text-center">
      <div class="icon-box"><i class="bi bi-alarm-fill"></i></div>
      <div>
        <h6 class="card-title mb-1" style="text-align:left;">Total RKM <br>Where outdoor progress 100%</h6>
        <h4 class="fw-bold text-light" style="text-align:left;">9</h4>
      </div>
    </div>
  </a>
</div>  -->
 <div class="col-lg-6 mb-4">
          <div class="card shadow rounded-4 p-4 h-100" style="background:#ffffff;border-radius:10px;">
            <h5 class="mb-3"><span style="text-shadow:1px 1px #fff, 2px 2px rgba(0,0,0,0.4);">Progress Distribution</span></h5>
            <canvas id="progressDonutChart" style="max-height:340px;"></canvas>
          </div>
        </div>
        <!-- Charts -->
        <div class="col-lg-6 mb-4">
          <div class="card shadow rounded-4 p-4 h-100" style="background:#ffffff;border-radius:10px;">
            <h5 class="mb-3"><span style="text-shadow:1px 1px #fff, 2px 2px rgba(0,0,0,0.4);">Section Overview</span></h5>
            <canvas id="sectionBarChart" style="max-height:340px;"></canvas>
          </div>
        </div>

       

      </div>
    </div>

    <!-- SLIDE 2: MAP (or any other content) -->
  <div class="carousel-item">
  <div class="row g-4">
    <div class="col-12">
      <div class="card shadow rounded-4 p-3">
        <h5 class="mb-3">GIS MAP - STATION-WISE KAVACH PROGRESS</h5>
        <div id="map" style="height:70vh; border-radius:14px;"></div>
      </div>
    </div>
  </div>
</div>



  </div>
<!-- Bottom controls -->
<div class="carousel-nav mt-2 text-center">
  <button class="btn btn-nav me-2"
          type="button" data-bs-target="#dashCarousel" data-bs-slide="prev">
    <i class="bi bi-arrow-left-circle"></i>
  </button>
  <button class="btn btn-nav"
          type="button" data-bs-target="#dashCarousel" data-bs-slide="next">
    <i class="bi bi-arrow-right-circle"></i>
  </button>
</div>

</div>
  
</div>





            
              
          </div>
          
          
          
          
          
          

     </div>
          
          
          
          








    </main>
    <style>
        body {
            background-color: #f1f5f9;
        }
        .card-header i {
            font-size: 1.1rem;
        }
        .form-label {
            font-size: 14px;
        }
        .btn i {
            margin-right: 4px;
        }

        .carousel-nav{ margin: 12px 0 80px; justify-content:center;display: flex;}              /* top 12px, bottom 56px */
@media (max-width: 575.98px){ .carousel-nav{ margin-bottom: 72px; } } /* thoda extra on mobile */

.btn-nav {
  padding: .7rem 1.2rem; 
  border: none; 
  border-radius: 999px;
  color: #156a3d; 
  /* background: linear-gradient(135deg, #2f80ed, #00c2ff); */
  /* box-shadow: 0 10px 22px rgba(0,0,0,.15); */
  /* transition: transform .15s ease, box-shadow .2s ease, filter .2s ease; */
  font-size: 2rem; /* bigger arrow size */
  line-height: 1; 
}

.btn-nav i {
  font-size: 2rem; /* make the arrow icon larger */
}



.btn-nav:active {
  transform: translateY(0);
}

    </style>

<!-- Bootstrap bundle + Leaflet JS already loaded hona chahiye -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const car = document.getElementById('dashCarousel');
  if (!car) return;

  // Ensure carousel instance
  const bsCar = bootstrap.Carousel.getInstance(car) ||
              new bootstrap.Carousel(car, { interval: false, pause: false });


  // ===== Map init on map slide =====
  let map, inited = false;

  if (car.querySelector('.carousel-item.active #map')) initMap();

  car.addEventListener('slid.bs.carousel', function () {
    const mapHolder = car.querySelector('.carousel-item.active #map');
    if (mapHolder) {
      if (!inited) initMap();
      else setTimeout(() => map.invalidateSize(), 200);
    }
  });

  function initMap() {
    const el = document.getElementById('map');
    if (!el) return;
    map = L.map(el).setView([20.5937, 78.9629], 5);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);

    const pts = [
      [21.551654329381005, 81.79477058270885, 'Tilda'],
      [21.73333873429447, 81.94633118023765, 'Bhatapara'],
      [21.25688670446784, 81.63010667455016, 'Raipur'],
      [21.199993564064826, 81.29157376254362, 'Durg']
    ];
    const group = L.featureGroup(
      pts.map(p => L.marker([p[0], p[1]]).bindPopup(p[2]))
    ).addTo(map);
    map.fitBounds(group.getBounds().pad(0.2));
    inited = true;
  }

  // ===== Pause auto-slide while user interacts inside carousel =====
  const inner = car.querySelector('.carousel-inner');
  let interacting = false, resumeTimer;

  const pause = () => { bsCar.pause(); interacting = true; };
  const tryResume = () => {
    interacting = false;
    clearTimeout(resumeTimer);
    resumeTimer = setTimeout(() => { if (!interacting) bsCar.cycle(); }, 1200);
  };

  ['mouseenter','pointerdown','touchstart','focusin'].forEach(ev =>
    inner.addEventListener(ev, pause, { passive:true })
  );
  ['mouseleave','pointerup','touchend','focusout'].forEach(ev =>
    inner.addEventListener(ev, tryResume, { passive:true })
  );

  // Map canvas par drag/click se bhi pause rahe
  car.addEventListener('slid.bs.carousel', () => {
    const m = document.getElementById('map');
    if (m) m.addEventListener('pointerdown', pause, { passive:true });
  });
});
</script>

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<!-- Chart.js + Datalabels plugin -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<script>
  // ===== BAR CHART (Section Overview) =====
  const ctxSection = document.getElementById("sectionBarChart").getContext("2d");

  new Chart(ctxSection, {
    type: "bar",
    data: {
      labels: [
        "Rajgama-Kotnia",
        "Kotnia-Jaranga",
        "Jaranga-Dagihora",
        "Dagihora-Hirangi",
        "Champa-Saragoon",
        "Saragoon-Baredikur",
        "Baredikur-Sakti",
        "Sakti-SPOCL"
      ],
      datasets: [
        {
          label: "Indoor Progress",
          data: [90, 95, 10, 15, 98, 12, 60, 30],
          backgroundColor: "#0dcaf0"
        },
        {
          label: "Outdoor Progress",
          data: [92, 97, 12, 18, 96, 70, 65, 45],
          backgroundColor: "#ffc107"
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: "bottom",
          labels: { color: "#000", font: { size: 13, weight: "600" } }
        }
      },
      scales: {
        x: {
          ticks: {
            autoSkip: false, // 👈 saare labels dikhenge
            maxRotation: 60, // thoda angle karke readable
            minRotation: 45,
            color: "#000",
            font: { size: 11, weight: "bold" }
          }
        },
        y: {
          beginAtZero: true,
          max: 100,
          ticks: { color: "#000", font: { size: 12 } }
        }
      }
    }
  });

  // ===== DONUT CHART (Progress Distribution) =====
  const ctxDonut = document.getElementById("progressDonutChart").getContext("2d");

  new Chart(ctxDonut, {
    type: "doughnut",
    data: {
      labels: ["Completed", "In Progress", "Pending"],
      datasets: [{
        data: [120, 30, 126],
        backgroundColor: ["#198754", "#ffc107", "#dc3545"],
        borderWidth: 2
      }]
    },
    options: {
      cutout: "70%",
      plugins: {
        legend: {
          position: "bottom",
          labels: { color: "#000", font: { size: 13, weight: "600" } }
        },
        datalabels: {   // 👈 plugin se labels dikhane ke liye
          color: "#fff",
          font: { size: 14, weight: "bold" },
          formatter: (value, ctx) => {
            let total = ctx.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
            let percentage = ((value / total) * 100).toFixed(1) + "%";
            return percentage;
          }
        }
      }
    },
    plugins: [ChartDataLabels] // plugin activate
  });
</script>

@include('includes.footer')
