




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
   
    text-shadow: 1px 1px 0 #000000, 2px 2px 4px rgba(0, 0, 0, 0.4);
}


.form-label {
  text-shadow: 1px 1px 0 #ffffff, 2px 2px 4px rgba(0, 0, 0, 0.3);
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

#datatablesSimple th, #datatablesSimple td {
    border: 1px solid #dee2e6 !important;
    padding: 0px 10px !important;
    vertical-align: middle;
}


.card-body {
    flex: 1 1 auto;
    padding: 0rem 10px !important;
}

.card-header {
    padding: 0.1rem 1rem !important;}


    .table>:not(caption)>*>* {
    padding: .0rem .5rem !important;
    background-color: var(--bs-table-bg);
    border-bottom-width: 1px;
    box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
}

.nowrap {
  white-space: nowrap;       /* 👈 break hone se rokega */
  overflow: hidden;          /* optional */
  text-overflow: ellipsis;   /* optional ... dikhayega */
  max-width: 200px;          /* 👈 apni marzi se set karo */
}

.btn-xs {
  font-size: 11px;    /* font chhota */
  padding: 2px 6px;   /* button ki height/width chhoti */
  line-height: 1.2;
}


.table>tbody {
    font-size: 13px !important;
}
</style>
<div id="layoutSidenav_content">
    <main>




<div class="container-fluid px-4 mt-5" style="margin-bottom: 100px;">

         @if(session('success'))
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(function() {
            let alertBox = document.getElementById('success-alert');
            if (alertBox) {
                alertBox.style.transition = "opacity 0.5s ease";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500); // 0.5s baad remove ho jaye
            }
        }, 3000); // 3 second
    </script>
@endif



  
<h4 class="mb-3 fw-bold text-left text-dark">
    Preparatory Works Status for Ground Kavach (NGP-JSG)
</h4>
<form action="{{ route('update.progress') }}" method="POST">
    @csrf

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th style="text-align: left;">Item</th>
                <th style="text-align: left;">Unit</th>
                <th style="text-align: left;">Description</th>
                <th>Scope</th>
                <th style="width: 8px;">Progress</th>
                <th>Balance</th>
                <th>Action</th>
                <th class="nowrap">Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cat1 as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: left;">{{ $row->item->item_name ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->item->unit ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->description }}</td>
                    <td class="fw-bold text-primary">{{ $row->scope }}</td>
                    <td>
                        <input type="number" 
                               name="progress[{{ $row->id }}]" 
                               value="{{ $row->progress }}" 
                               class="form-control form-control-sm text-center fw-bold">
                    </td>
                    <td class="fw-bold text-danger">{{ $row->scope - $row->progress }}</td>
                    <td>
                        <button type="submit" 
        name="scope_id" 
        value="{{ $row->id }}" 
        class="btn btn-success btn-xs px-2 shadow-sm" style="padding-top: 2px !important;
    padding-bottom: 2px !important;">
    Update
</button>

                    </td>
                    <td class="text-muted small nowrap">
                          <a href="javascript:void(0)"
     class="open-history"
     data-id="{{ $row->id }}"
     data-history='@json($row->history)'>
     {{ \Carbon\Carbon::parse($row->updated_at)->timezone('Asia/Kolkata')->format('d-M-Y') }}
  </a>
                        <br>
       <span style="color: #000;">
                                            @php
        $count = $row->history->count();
    @endphp

    @if($count > 1)
        {{ $row->history[$count-2]->progress }} → {{ $row->history[$count-1]->progress }}
    @else
        {{ $row->history->last()->progress ?? '-' }}
    @endif
       </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>







<h4 class="mb-3 fw-bold text-left text-dark">
   Preparatory Works Status for Tower 			
			

</h4>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th style="text-align: left;">Item</th>
                <th style="text-align: left;">Unit</th>
                <th style="text-align: left;">Description</th>
                <th>Scope</th>
                <th style="width: 8px;">Progress</th>
                <th>Balance</th>
                <th>Action</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cat2 as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: left;">{{ $row->item->item_name ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->item->unit ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->description }}</td>
                    <td class="fw-bold text-primary">{{ $row->scope }}</td>
                    <td>
                        <input type="number" 
                               name="progress[{{ $row->id }}]" 
                               value="{{ $row->progress }}" 
                               class="form-control form-control-sm text-center fw-bold">
                    </td>
                    <td class="fw-bold text-danger">{{ $row->scope - $row->progress }}</td>
                    <td>
                           <button type="submit" 
        name="scope_id" 
        value="{{ $row->id }}" 
        class="btn btn-success btn-xs px-2 shadow-sm" style="padding-top: 2px !important;
    padding-bottom: 2px !important;">
    Update
</button>
                    </td>
                    <td class="text-muted small">
                     
        <a href="javascript:void(0)"
     class="open-history"
     data-id="{{ $row->id }}"
     data-history='@json($row->history)'>
     {{ \Carbon\Carbon::parse($row->updated_at)->timezone('Asia/Kolkata')->format('d-M-Y') }}
  </a>
    <br>
                                    <span style="color: #000;">
                                            @php
        $count = $row->history->count();
    @endphp

    @if($count > 1)
        {{ $row->history[$count-2]->progress }} → {{ $row->history[$count-1]->progress }}
    @else
        {{ $row->history->last()->progress ?? '-' }}
    @endif
       </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
  





<h4 class="mb-3 fw-bold text-left text-dark">
    Preparatory Works Status for OFC 			
			

</h4>

<div class="table-responsive">
    <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
        <thead class="table-header">
            <tr>
                <th>#</th>
                <th style="text-align: left;">Item</th>
                <th style="text-align: left;">Unit</th>
                <th style="text-align: left;">Description</th>
                <th>Scope</th>
                <th style="width: 8px;">Progress</th>
                <th>Balance</th>
                <th>Action</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cat3 as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td style="text-align: left;">{{ $row->item->item_name ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->item->unit ?? '-' }}</td>
                    <td style="text-align: left;">{{ $row->description }}</td>
                    <td class="fw-bold text-primary">{{ $row->scope }}</td>
                    <td>
                        <input type="number" 
                               name="progress[{{ $row->id }}]" 
                               value="{{ $row->progress }}" 
                               class="form-control form-control-sm text-center fw-bold">
                    </td>
                    <td class="fw-bold text-danger">{{ $row->scope - $row->progress }}</td>
                    <td>
                          <button type="submit" 
        name="scope_id" 
        value="{{ $row->id }}" 
        class="btn btn-success btn-xs px-2 shadow-sm" style="padding-top: 2px !important;
    padding-bottom: 2px !important;">
    Update
</button>
                    </td>
                   <td class="text-muted small">
   <a href="javascript:void(0)"
     class="open-history"
     data-id="{{ $row->id }}"
     data-history='@json($row->history)'>
     {{ \Carbon\Carbon::parse($row->updated_at)->timezone('Asia/Kolkata')->format('d-M-Y') }}
  </a>
  <br>
  <span style="color: #000;">
    @php $count = $row->history->count(); @endphp
    @if($count > 1)
      {{ $row->history[$count-2]->progress }} → {{ $row->history[$count-1]->progress }}
    @else
      {{ $row->history->last()->progress ?? '-' }}
    @endif
  </span>
</td>

                </tr>



            @endforeach
        </tbody>
    </table>

</div>

  

</form>




  </div>

</div>





            
              
          </div>
          
          
          
          
          
          

     </div>
<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header text-white" style="background-color: #5780bf ;">
        <h5 class="modal-title">History</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <table class="table table-sm table-bordered text-center">
          <thead>
            <tr>
              <th>#</th>
              <th>Scope</th>
              <th>Progress</th>
              <th>Balance</th>
              <th>Updated At</th>
            </tr>
          </thead>
          <tbody id="historyTableBody">
            <!-- JS will inject rows here -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".open-history").forEach(function(el) {
        el.addEventListener("click", function() {
            let history = JSON.parse(this.getAttribute("data-history"));
            let tbody = document.getElementById("historyTableBody");
            tbody.innerHTML = "";

            if(history.length > 0) {
                history.forEach((h, index) => {
                    let balance = h.scope - h.progress; // ✅ Balance nikala
                    tbody.innerHTML += `
                        <tr>
                            <td>${index+1}</td>
                            <td>${h.scope}</td>
                            <td>${h.progress}</td>
                            <td>${balance}</td> <!-- ✅ Balance show -->
                            <td>${new Date(h.updated_at).toLocaleString("en-IN", { timeZone: "Asia/Kolkata" })}</td>
                        </tr>
                    `;
                });
            } else {
                tbody.innerHTML = `<tr><td colspan="5" class="text-muted">No history found</td></tr>`;
            }

            // Open modal (Bootstrap 5)
            var modal = new bootstrap.Modal(document.getElementById('historyModal'));
            modal.show();
        });
    });
});
</script>


 <style>
    /* Table header gradient */
.table-header {
    background: linear-gradient(90deg, #007bff, #00c4ff);
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    text-transform: uppercase;
}

/* Alternate row color */
.custom-table tbody tr:nth-child(odd) {
    background-color: #f9fcff;
}

.custom-table tbody tr:nth-child(even) {
    background-color: #eef6fb;
}

/* Hover effect */
.custom-table tbody tr:hover {
    background-color: #dff0ff !important;
    transition: 0.3s;
}

/* Table borders */
.custom-table {
    border-radius: 12px;
    overflow: hidden;
}

/* Input focus effect */
.custom-table input:focus {
    border-color: #007bff;
    box-shadow: 0 0 4px #007bff66;
    transition: 0.2s;
}

/* Update button hover */
.btn-success:hover {
    background-color: #28a745;
    box-shadow: 0 4px 10px rgba(0, 128, 0, 0.3);
    transform: translateY(-1px);
    transition: 0.2s;
}


thead {
    color: #000000 !important;
    text-shadow: none !important;
    background: #bbcde5 !important;
}
 </style>
<!-- Bootstrap JS (with Popper) -->

@include('includes.footer')