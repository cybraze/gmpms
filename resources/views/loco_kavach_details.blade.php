




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



   
<h3 class="mb-3 fw-bold text-left text-dark d-flex justify-content-between align-items-center mt-5">
    Loco Kavach Status											

    <button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#addDataModalthree">
        <i class="bi bi-plus-lg me-1"></i> Add Data
    </button>
</h3>


<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
    <thead class="table-header text-center align-middle">
        <tr>
            <th>#</th>
            <th class="text-start">Loco shed</th>
            <th class="text-start">Loco Holding (Nos)</th>
            <th colspan="3">KAVACH allotment by Railway Board</th>
            <th colspan="3">Locos fitted with Kavach(Nos)</th>
            <th colspan="3">Balance(Nos)</th>
            
            <th>Remarks</th>
            <th>Action</th>
            <th>Updated</th>
        </tr>
        <tr>
            <th></th><th></th><th></th>
            <th>M/s Kernex</th><th>M/s. Medha</th><th>Total</th>
            <th>M/s Kernex</th><th>M/s. Medha</th><th>Total</th>
            <th>M/s Kernex</th><th>M/s. Medha</th><th>Total</th>
           <th></th>
            <th></th><th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($locodata  as $row)
       <form action="{{ route('locokavach_update', $row->id) }}" method="POST">
            @csrf
           
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">{{ $row->shed->loco_shed ?? '-' }}</td>
                <td class="text-start">{{ $row->shed->loco_holding ?? '-' }}</td>
                <!-- RFID -->
                <td>{{ $row->allotment_kernex }}</td>
                <td>{{$row->allotment_medha}}</td>
                <td>{{ $row->allotment_kernex + $row->allotment_medha }}</td>

                
               
                <td><input type="number" name="fitted_kernex" value="{{ $row->fitted_kernex }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td><input type="number" name="fitted_medha" value="{{ $row->fitted_medha }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->fitted_kernex + $row->fitted_medha }}</td>

                <!-- SE HUT -->
                <td>{{ $row->allotment_kernex }}</td>
                <td>{{$row->allotment_medha}}</td>
                <td>{{ $row->allotment_kernex + $row->allotment_medha }}</td>

               <td>
    <input type="text" 
           name="remarks" 
           value="{{ $row->remarks }}" 
           class="form-control form-control-sm text-center fw-bold"
           placeholder="Enter remarks">
</td>

                

                <!-- Action + Updated -->
                <td>
                    <button type="submit" class="btn btn-success btn-sm px-3 shadow-sm">Update</button>
                </td>
                <td class="text-muted small">

                <a type="button" class=" view-loco-history" data-id="{{ $row->id }}">
  {{ $row->updated_at?->format('d-m-Y') }}
      </a>

                </td>
            </tr>
        </form>
        @endforeach
        
</form>

    </tbody>
</table>



</div>






<div class="modal fade" id="locoHistoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-light" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title">Loco KAVACH Section History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body history-modal-body">
        <table class="table table-bordered table-striped table-sm history-table">
          <thead id="locoHistoryTableHead"></thead>
          <tbody id="locoHistoryTableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>



<script>
  $(document).on("click", ".view-loco-history", function () {
    var sectionId = $(this).data("id");

    $.get("{{ route('loco.section.history', ':id') }}".replace(':id', sectionId), function (data) {
        var header = `
          <tr class="table-primary">
            <th>#</th>
           
            <th>Loco Shed</th>
            <th>Allotment Kernex</th>
            <th>Allotment Medha</th>
            <th>Fitted Kernex</th>
            <th>Fitted Medha</th>
            <th>Remarks</th>
             <th>Changed By</th>
            <th>Changed At</th>
          </tr>
        `;

        var rows = "";
        data.forEach(function (item, index) {
            let s = JSON.parse(item.snapshot_json);
            rows += `
              <tr>
                <td>${index + 1}</td>
               
                <td>${item.shed_name ?? s.loco_shed_id}</td>
                <td>${s.allotment_kernex}</td>
                <td>${s.allotment_medha}</td>
                <td>${s.fitted_kernex}</td>
                <td>${s.fitted_medha}</td>
                <td>${s.remarks ?? ''}</td>
                 <td>${item.changed_by}</td>
                <td>${item.changed_at}</td>
              </tr>
            `;
        });

        $("#locoHistoryTableHead").html(header);
        $("#locoHistoryTableBody").html(rows);

        var myModal = new bootstrap.Modal(document.getElementById('locoHistoryModal'));
        myModal.show();
    });
});

</script>


<!-- Bootstrap Modal -->
<div class="modal fade" id="addDataModalthree" tabindex="-1" aria-labelledby="addDataModalthreeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title" id="addDataModalthreeLabel">Add Loco KAVACH DATA</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('locokavach_store') }}" method="POST">
    @csrf
     <input type="hidden" name="new_project_id" value="{{ $id }}">
        <div class="modal-body">
          <div class="row g-3">

            <!-- Section Dropdown -->
       <div class="col-md-6">
    <label class="form-label">Loco Shed</label>
    <select name="loco_shed_id" class="form-select" required>
        <option value="">Select Loco Shed</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->loco_shed }}</option>
        @endforeach
    </select>
</div>



            <!-- RKM -->
            <div class="col-md-6">
              <label class="form-label">KAVACH allotment by Railway Board(M/s Kernex)</label>
              <input type="number" class="form-control" name="allotment_kernex" required>
            </div>

            <!-- RFID Scope -->
            <div class="col-md-6">
              <label class="form-label">KAVACH allotment by Railway Board(M/s. Medha)</label>
              <input type="number" class="form-control" name="allotment_medha" required>
            </div>

            

          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn text-light" style="background: linear-gradient(to right, #5780bf, #5780bf);">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>















  </div>

</div>





            
              
          </div>
          
          
          
          
          
          

     </div>


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