




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



   
<h3 class="mb-3 fw-bold text-left text-dark d-flex justify-content-between align-items-center">
    Section Target Works Status for Ground Kavach

    <button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#addDataModal">
        <i class="bi bi-plus-lg me-1"></i> Add Data
    </button>
</h3>


<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
    <thead class="table-header text-center align-middle">
        <tr>
            <th>#</th>
            <th class="text-start">Section</th>
            <th class="text-start">RKM</th>
            <th colspan="3">RFID</th>
            <th colspan="3">Stationary Equipments (1)</th>
            <th colspan="3">Stationary Equipments (2)</th>
            <th colspan="3">FAT (Stations)</th>
            <th colspan="3">FAT (HUT)</th>
            <th colspan="3">SAT (Stations)</th>
            <th colspan="3">SAT (HUT)</th>
            <th colspan="3">Indoor Design Documents</th>
            <th colspan="3">Indoor Design Documents</th>
            <th>Action</th>
            <th>Updated</th>
        </tr>
        <tr>
            <th></th><th></th><th></th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th></th><th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $row)
       <form action="{{ route('update.section.data', $row->id) }}" method="POST">
            @csrf
           
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">{{ $row->section->section_name ?? '' }}</td>
                <td class="text-start">{{ $row->rkm }}</td>

                <!-- RFID -->
                <td>{{ $row->rfid_scope }}</td>
                <td><input type="number" name="rfid_comp" value="{{ $row->rfid_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->rfid_scope - $row->rfid_comp }}</td>

                <!-- SE STN -->
                <td>{{ $row->se_stn_scope }}</td>
                <td><input type="number" name="se_stn_comp" value="{{ $row->se_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->se_stn_scope - $row->se_stn_comp }}</td>

                <!-- SE HUT -->
                <td>{{ $row->se_hut_scope }}</td>
                <td><input type="number" name="se_hut_comp" value="{{ $row->se_hut_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->se_hut_scope - $row->se_hut_comp }}</td>

                <!-- FAT STN -->
                <td>{{ $row->fat_stn_scope }}</td>
                <td><input type="number" name="fat_stn_comp" value="{{ $row->fat_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->fat_stn_scope - $row->fat_stn_comp }}</td>

                <!-- FAT HUT -->
                <td>{{ $row->fat_hut_scope }}</td>
                <td><input type="number" name="fat_hut_comp" value="{{ $row->fat_hut_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->fat_hut_scope - $row->fat_hut_comp }}</td>

                <!-- SAT STN -->
                <td>{{ $row->sat_stn_scope }}</td>
                <td><input type="number" name="sat_stn_comp" value="{{ $row->sat_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->sat_stn_scope - $row->sat_stn_comp }}</td>

                <!-- SAT HUT -->
                <td>{{ $row->sat_hut_scope }}</td>
                <td><input type="number" name="sat_hut_comp" value="{{ $row->sat_hut_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->sat_hut_scope - $row->sat_hut_comp }}</td>

                <!-- IDD STN -->
                <td>{{ $row->idd_stn_scope }}</td>
                <td><input type="number" name="idd_stn_comp" value="{{ $row->idd_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->idd_stn_scope - $row->idd_stn_comp }}</td>

                <!-- IDD HUT -->
                <td>{{ $row->idd_hut_scope }}</td>
                <td><input type="number" name="idd_hut_comp" value="{{ $row->idd_hut_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $row->idd_hut_scope - $row->idd_hut_comp }}</td>

                <!-- Action + Updated -->
                <td>
                    <button type="submit" class="btn btn-success btn-sm px-3 shadow-sm">Update</button>
                </td>
                <td class="text-muted small">
     <a type="button" class=" view-history" data-id="{{ $row->id }}">
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

<style>
  .history-modal-body {
      max-height: 75vh;       /* vertical size */
      overflow-y: auto;
      overflow-x: auto;       /* horizontal scroll */
  }
  .history-table thead th {
      position: sticky;
      top: 0;
      /* background: #0d6efd; */
      /* color: white; */
      z-index: 2;
      text-align: center;
      font-size: 13px;
      white-space: nowrap;
  }
  .history-table td {
      white-space: nowrap;
      font-size: 13px;
      text-align: center;
  }
</style>


<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered"> <!-- 👈 bada modal -->
    <div class="modal-content">
      <div class="modal-header  text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title">Ground Kavach Section History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body history-modal-body">
        <table class="table table-bordered table-striped table-sm history-table">
          <thead id="historyTableHead"></thead>
          <tbody id="historyTableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
    var sectionsMap = @json($sectionsMap);
</script>

<script>
$(document).on("click", ".view-history", function () {
    var sectionId = $(this).data("id");

    $.get("{{ url('/section/history') }}/" + sectionId, function (data) {
        var header = `
          <tr class="" style="background: #ddebff;color:black;">
            <th>#</th>
            
            <th>Section</th>
            <th>RKM</th>
            <th>RFID Scope</th><th>RFID Comp</th>
            <th>SE Stn Scope</th><th>SE Stn Comp</th>
            <th>SE Hut Scope</th><th>SE Hut Comp</th>
            <th>FAT Stn Scope</th><th>FAT Stn Comp</th>
            <th>FAT Hut Scope</th><th>FAT Hut Comp</th>
            <th>SAT Stn Scope</th><th>SAT Stn Comp</th>
            <th>SAT Hut Scope</th><th>SAT Hut Comp</th>
            <th>IDD Stn Scope</th><th>IDD Stn Comp</th>
            <th>IDD Hut Scope</th><th>IDD Hut Comp</th>
            <th>Changed By</th>
            <th>Changed At</th>
          </tr>
        `;

        var rows = "";
        data.forEach(function (item, index) {
            let s = JSON.parse(item.snapshot_json);

            // 👇 Replace section_id with section_name
            let sectionName = "";
            if (s.section_id) {
                sectionName = sectionsMap[s.section_id] ?? s.section_id;
            }

            rows += `
              <tr>
                <td>${index + 1}</td>
                
                <td>${sectionName}</td>
                <td>${s.rkm}</td>
                <td>${s.rfid_scope}</td><td>${s.rfid_comp}</td>
                <td>${s.se_stn_scope}</td><td>${s.se_stn_comp}</td>
                <td>${s.se_hut_scope}</td><td>${s.se_hut_comp}</td>
                <td>${s.fat_stn_scope}</td><td>${s.fat_stn_comp}</td>
                <td>${s.fat_hut_scope}</td><td>${s.fat_hut_comp}</td>
                <td>${s.sat_stn_scope}</td><td>${s.sat_stn_comp}</td>
                <td>${s.sat_hut_scope}</td><td>${s.sat_hut_comp}</td>
                <td>${s.idd_stn_scope}</td><td>${s.idd_stn_comp}</td>
                <td>${s.idd_hut_scope}</td><td>${s.idd_hut_comp}</td>
                 <td>${item.changed_by}</td>
                <td>${item.changed_at}</td>
              </tr>
            `;
        });

        $("#historyTableBody").html(header + rows);
        $("#historyModal").modal("show");
    });
});

</script>


  



<!-- Bootstrap Modal -->
<div class="modal fade" id="addDataModal" tabindex="-1" aria-labelledby="addDataModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title" id="addDataModalLabel">Add Section Target Data</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('store.section.data') }}" method="POST">
    @csrf
     <input type="hidden" name="new_project_id" value="{{ $id }}">
        <div class="modal-body">
          <div class="row g-3">

            <!-- Section Dropdown -->
           <div class="col-md-6">
    <label class="form-label">Section</label>
    <select name="section_id" class="form-select" required>
        <option value="">Select Section</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
        @endforeach
    </select>
</div>


            <!-- RKM -->
            <div class="col-md-6">
              <label class="form-label">RKM</label>
              <input type="number" class="form-control" name="rkm" required>
            </div>

            <!-- RFID Scope -->
            <div class="col-md-6">
              <label class="form-label">RFID Scope</label>
              <input type="number" class="form-control" name="rfid_scope" required>
            </div>

            <!-- SE STN Scope -->
            <div class="col-md-6">
              <label class="form-label">Stationary Equipments Stations Scope</label>
              <input type="number" class="form-control" name="se_stn_scope" required>
            </div>

            <!-- SE HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">Stationary Equipments HUT Scope</label>
              <input type="number" class="form-control" name="se_hut_scope" required>
            </div>

            <!-- FAT STN Scope -->
            <div class="col-md-6">
              <label class="form-label">FAT Stations Scope</label>
              <input type="number" class="form-control" name="fat_stn_scope" required>
            </div>

            <!-- FAT HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">FAT HUT Scope</label>
              <input type="number" class="form-control" name="fat_hut_scope" required>
            </div>

            <!-- SAT STN Scope -->
            <div class="col-md-6">
              <label class="form-label">SAT Stations Scope</label>
              <input type="number" class="form-control" name="sat_stn_scope" required>
            </div>

            <!-- SAT HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">SAT HUT Scope</label>
              <input type="number" class="form-control" name="sat_hut_scope" required>
            </div>

            <!-- IDD STN Scope -->
            <div class="col-md-6">
              <label class="form-label">Indoor Design Documents Stations Scope</label>
              <input type="number" class="form-control" name="idd_stn_scope" required>
            </div>

            <!-- IDD HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">Indoor Design Documents HUT Scope</label>
              <input type="number" class="form-control" name="idd_hut_scope" required>
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




















   
<h3 class="mb-3 fw-bold text-left text-dark d-flex justify-content-between align-items-center mt-5">
    Section Target Works Status for Tower

    <button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#addDataModaltwo">
        <i class="bi bi-plus-lg me-1"></i> Add Data
    </button>
</h3>


<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
    <thead class="table-header text-center align-middle">
        <tr>
            <th>#</th>
            <th class="text-start">Section</th>
            <th class="text-start">RKM</th>
            <th colspan="3">Tower Foundations (Stations)</th>
            <th colspan="3">Tower Erections (Stations)</th>
            <th colspan="3">Tower Foundations (Sections)</th>
            <th colspan="3">Tower Erections (Sections)</th>
            
            
            <th>Action</th>
            <th>Updated</th>
        </tr>
        <tr>
            <th></th><th></th><th></th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
           
            <th></th><th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($towerdata as $rowtwo)
       <form action="{{ route('tower_update', $rowtwo->id) }}" method="POST">
            @csrf
           
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">{{ $rowtwo->section->section_name ?? '' }}</td>
                <td class="text-start">{{ $rowtwo->rkm }}</td>

                <!-- RFID -->
                <td>{{ $rowtwo->tower_foundation_stn_scope }}</td>
                <td><input type="number" name="tower_foundation_stn_comp" value="{{ $rowtwo->tower_foundation_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowtwo->tower_foundation_stn_scope - $rowtwo->tower_foundation_stn_comp }}</td>

                <!-- SE STN -->
                <td>{{ $rowtwo->tower_erection_stn_scope }}</td>
                <td><input type="number" name="tower_erection_stn_comp" value="{{ $rowtwo->tower_erection_stn_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowtwo->tower_erection_stn_scope - $rowtwo->tower_erection_stn_comp }}</td>

                <!-- SE HUT -->
                <td>{{ $rowtwo->tower_foundation_scope }}</td>
                <td><input type="number" name="tower_foundation_comp" value="{{ $rowtwo->tower_foundation_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowtwo->tower_foundation_scope - $rowtwo->tower_foundation_comp }}</td>

                <!-- FAT STN -->
                <td>{{ $rowtwo->tower_erection_scope }}</td>
                <td><input type="number" name="tower_erection_comp" value="{{ $rowtwo->tower_erection_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowtwo->tower_erection_scope - $rowtwo->tower_erection_comp }}</td>

            
                

                <!-- Action + Updated -->
                <td>
                    <button type="submit" class="btn btn-success btn-sm px-3 shadow-sm">Update</button>
                </td>
                <td class="text-muted small">

                
<a type="button" 
        class="view-tower-history" 
        data-id="{{ $rowtwo->id }}">
  {{ $rowtwo->updated_at?->format('d-m-Y') }}
</a>


                </td>
            </tr>
        </form>
        @endforeach
        
</form>

    </tbody>
</table>



</div>





<div class="modal fade" id="towerHistoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title">Tower Section History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body history-modal-body">
        <table class="table table-bordered table-striped table-sm history-table">
          <thead id="towerHistoryTableHead"></thead>
          <tbody id="towerHistoryTableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
$(document).on("click", ".view-tower-history", function () {
    var sectionId = $(this).data("id");

    $.get("{{ route('tower.section.history', ':id') }}".replace(':id', sectionId), function (data) {
        var header = `
          <tr class="" style="background: #ddebff;color:black;">
            <th>#</th>
            
            <th>Section</th>
            <th>RKM</th>
            <th>Foundation Stn Scope</th><th>Foundation Stn Comp</th>
            <th>Erection Stn Scope</th><th>Erection Stn Comp</th>
            <th>Foundation Scope</th><th>Foundation Comp</th>
            <th>Erection Scope</th><th>Erection Comp</th>
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
              
                <td>${item.section_name ?? s.section_id}</td>
                <td>${s.rkm}</td>
                <td>${s.tower_foundation_stn_scope}</td><td>${s.tower_foundation_stn_comp}</td>
                <td>${s.tower_erection_stn_scope}</td><td>${s.tower_erection_stn_comp}</td>
                <td>${s.tower_foundation_scope}</td><td>${s.tower_foundation_comp}</td>
                <td>${s.tower_erection_scope}</td><td>${s.tower_erection_comp}</td>
                  <td>${item.changed_by}</td>
                <td>${item.changed_at}</td>
              </tr>
            `;
        });

        $("#towerHistoryTableHead").html(header);
        $("#towerHistoryTableBody").html(rows);

        // Bootstrap 5 way to open modal
        var myModal = new bootstrap.Modal(document.getElementById('towerHistoryModal'));
        myModal.show();
    });
});
</script>




<!-- Bootstrap Modal -->
<div class="modal fade" id="addDataModaltwo" tabindex="-1" aria-labelledby="addDataModaltwoLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title" id="addDataModaltwoLabel">Add Section Target Data of Tower</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('tower_store') }}" method="POST">
    @csrf
     <input type="hidden" name="new_project_id" value="{{ $id }}">
        <div class="modal-body">
          <div class="row g-3">

            <!-- Section Dropdown -->
           <div class="col-md-6">
    <label class="form-label">Section</label>
    <select name="section_id" class="form-select" required>
        <option value="">Select Section</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
        @endforeach
    </select>
</div>


            <!-- RKM -->
            <div class="col-md-6">
              <label class="form-label">RKM</label>
              <input type="number" class="form-control" name="rkm" required>
            </div>

            <!-- RFID Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of Tower Foundations (Stations)</label>
              <input type="number" class="form-control" name="tower_foundation_stn_scope" required>
            </div>

            <!-- SE STN Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of Tower Erections (Stations)</label>
              <input type="number" class="form-control" name="tower_erection_stn_scope" required>
            </div>

            <!-- SE HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of Tower Foundations (Sections)</label>
              <input type="number" class="form-control" name="tower_foundation_scope" required>
            </div>

            <!-- FAT STN Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of Tower Erections (Sections)</label>
              <input type="number" class="form-control" name="tower_erection_scope" required>
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





















   
<h3 class="mb-3 fw-bold text-left text-dark d-flex justify-content-between align-items-center mt-5">
    Section Target Works Status for OFC

    <button type="button" class="btn btn-primary btn-sm shadow-sm" data-bs-toggle="modal" data-bs-target="#addDataModalthree">
        <i class="bi bi-plus-lg me-1"></i> Add Data
    </button>
</h3>


<div class="table-responsive">
  <table class="table table-bordered table-hover align-middle shadow-sm custom-table">
    <thead class="table-header text-center align-middle">
        <tr>
            <th>#</th>
            <th class="text-start">Section</th>
            <th class="text-start">RKM</th>
            <th colspan="3">OFC Ducting(RKM)</th>
            <th colspan="3">OFC Laying (RKM)</th>
            <th colspan="3">Outdoor Design Documents(Nos.)</th>
            
            
            <th>Action</th>
            <th>Updated</th>
        </tr>
        <tr>
            <th></th><th></th><th></th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
            <th>Scope</th><th>Completed</th><th>Balance</th>
           
            <th></th><th></th>
        </tr>
    </thead>

    <tbody>
        @foreach($ofcdata as $rowthree)
       <form action="{{ route('ofc_update', $rowthree->id) }}" method="POST">
            @csrf
           
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-start">{{ $rowthree->section->section_name ?? '' }}</td>
                <td class="text-start">{{ $rowthree->rkm }}</td>

                <!-- RFID -->
                <td>{{ $rowthree->ofc_duct_scope }}</td>
                <td><input type="number" name="ofc_duct_comp" value="{{ $rowthree->ofc_duct_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowthree->ofc_duct_scope - $rowthree->ofc_duct_comp }}</td>

                <!-- SE STN -->
                <td>{{ $rowthree->ofc_lay_scope }}</td>
                <td><input type="number" name="ofc_lay_comp" value="{{ $rowthree->ofc_lay_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowthree->ofc_lay_scope - $rowthree->ofc_lay_comp }}</td>

                <!-- SE HUT -->
                <td>{{ $rowthree->outdoor_design_scope }}</td>
                <td><input type="number" name="outdoor_design_comp" value="{{ $rowthree->outdoor_design_comp }}" class="form-control form-control-sm text-center fw-bold"></td>
                <td>{{ $rowthree->outdoor_design_scope - $rowthree->outdoor_design_comp }}</td>

               
                

                <!-- Action + Updated -->
                <td>
                    <button type="submit" class="btn btn-success btn-sm px-3 shadow-sm">Update</button>
                </td>
                <td class="text-muted small">

                <a type="button" class=" view-ofc-history" data-id="{{ $rowthree->id }}">
  {{ $rowthree->updated_at?->format('d-m-Y') }}
</a>

                </td>
            </tr>
        </form>
        @endforeach
        
</form>

    </tbody>
</table>



</div>




<div class="modal fade" id="ofcHistoryModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title">OFC Section History</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body history-modal-body">
        <table class="table table-bordered table-striped table-sm history-table">
          <thead id="ofcHistoryTableHead"></thead>
          <tbody id="ofcHistoryTableBody"></tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).on("click", ".view-ofc-history", function () {
    var sectionId = $(this).data("id");

    $.get("{{ route('ofc.section.history', ':id') }}".replace(':id', sectionId), function (data) {
        var header = `
          <tr class="" style="background: #ddebff;color:black;">
            <th>#</th>
            
            <th>Section</th>
            <th>RKM</th>
            <th>OFC Duct Scope</th><th>OFC Duct Comp</th>
            <th>OFC Lay Scope</th><th>OFC Lay Comp</th>
            <th>Outdoor Design Scope</th><th>Outdoor Design Comp</th>
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
                
                <td>${item.section_name ?? s.section_id}</td>
                <td>${s.rkm}</td>
                <td>${s.ofc_duct_scope}</td><td>${s.ofc_duct_comp}</td>
                <td>${s.ofc_lay_scope}</td><td>${s.ofc_lay_comp}</td>
                <td>${s.outdoor_design_scope}</td><td>${s.outdoor_design_comp}</td>
                <td>${item.changed_by}</td>
                <td>${item.changed_at}</td>
              </tr>
            `;
        });

        $("#ofcHistoryTableHead").html(header);
        $("#ofcHistoryTableBody").html(rows);

        var myModal = new bootstrap.Modal(document.getElementById('ofcHistoryModal'));
        myModal.show();
    });
});

</script>





<!-- Bootstrap Modal -->
<div class="modal fade" id="addDataModalthree" tabindex="-1" aria-labelledby="addDataModalthreeLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      
      <div class="modal-header text-white" style="background: linear-gradient(to right, #5780bf, #5780bf);">
        <h5 class="modal-title" id="addDataModalthreeLabel">Add Section Target Data of OFC</h5>
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <form action="{{ route('ofc_store') }}" method="POST">
    @csrf
     <input type="hidden" name="new_project_id" value="{{ $id }}">
        <div class="modal-body">
          <div class="row g-3">

            <!-- Section Dropdown -->
           <div class="col-md-6">
    <label class="form-label">Section</label>
    <select name="section_id" class="form-select" required>
        <option value="">Select Section</option>
        @foreach($sections as $section)
            <option value="{{ $section->id }}">{{ $section->section_name }}</option>
        @endforeach
    </select>
</div>


            <!-- RKM -->
            <div class="col-md-6">
              <label class="form-label">RKM</label>
              <input type="number" class="form-control" name="rkm" required>
            </div>

            <!-- RFID Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of OFC Ducting(RKM)</label>
              <input type="number" class="form-control" name="ofc_duct_scope" required>
            </div>

            <!-- SE STN Scope -->
            <div class="col-md-6">
              <label class="form-label">Scope of OFC Laying (RKM)</label>
              <input type="number" class="form-control" name="ofc_lay_scope" required>
            </div>

            <!-- SE HUT Scope -->
            <div class="col-md-6">
              <label class="form-label">Outdoor Design Documents(Nos.)</label>
              <input type="number" class="form-control" name="outdoor_design_scope" required>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@include('includes.footer')