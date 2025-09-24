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
    .progress-dropdown {
        width: 120px; /* Limit the width */
        height: 10px; /* Set a fixed height */
    }
</style>
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
padding: 0px 20px !important;
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
  white-space: nowrap;       /* ðŸ‘ˆ break hone se rokega */
  overflow: hidden;          /* optional */
  text-overflow: ellipsis;   /* optional ... dikhayega */
  max-width: 200px;          /* ðŸ‘ˆ apni marzi se set karo */
}

.btn-xs {
  font-size: 11px;    /* font chhota */
  padding: 2px 6px;   /* button ki height/width chhoti */
  line-height: 1.2;
}


.table>tbody {
    font-size: 13px !important;
}

.table>thead {
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
 Tender List 
<button type="button" 
class="btn btn-success btn-sm px-3 shadow-sm" 
style="float:right;" 
data-bs-toggle="modal" 
data-bs-target="#addProjectModal">
Add Project
</button>
</h4>
<div id="flash-messages"></div>
<form action="#" method="POST">
@csrf
<div class="table-responsive">
<table class="table table-bordered table-hover align-middle shadow-sm custom-table">
<thead class="table-header">
<tr>
<th>#</th>
    <th style="text-align: left;">Item</th>
    <th style="text-align: left;">Section</th>
    <th style="text-align: left;">Tender Status On</th>
    <th style="text-align: left;">NIT Date</th>
    
    <th>Tender Opening Date</th>
    <th>LOA Date</th>
    <th>Remarks</th>
    <th>Action</th>
    <th>Updated</th>
</tr>
</thead>
<tbody>
@foreach($tenderData as $row)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td style="text-align: left;">{{ $row->item->name ?? '-' }}</td>
    <td style="text-align: left;">{{ $row->section->section_name ?? '-' }}</td>
    <td style="text-align: left;">{{ $row->tender_status }}</td>
    <td>
        <input type="date" 
        class="form-control form-control-sm datepicker-field" 
        value="{{ $row->nit_date ? \Carbon\Carbon::parse($row->nit_date)->format('Y-m-d') : '' }}" 
        data-id="{{ $row->id }}" 
        data-field="nit_date">
    </td>
    <td>
        <input type="date" 
        class="form-control form-control-sm datepicker-field" 
        value="{{ $row->tender_opening_date ? \Carbon\Carbon::parse($row->tender_opening_date)->format('Y-m-d') : '' }}" 
        data-id="{{ $row->id }}" 
        data-field="tender_opening_date">
    </td>
     <td>
        <input type="date" 
        class="form-control form-control-sm datepicker-field" 
        value="{{ $row->loa_date ? \Carbon\Carbon::parse($row->loa_date)->format('Y-m-d') : '' }}" 
        data-id="{{ $row->id }}" 
        data-field="loa_date">
    </td>
    <td>
    <textarea name="remarks[{{ $row->id }}]" 
      class="form-control form-control-sm" 
      rows="2" 
      placeholder="Enter remark" data-field="remarks">{{ $row->remarks ?? '' }}</textarea>
    </td>
    <td>
        <button type="button" 
        name="scope_id" 
        value="{{ $row->id }}" 
         class="btn btn-success updateData btn-xs px-2 shadow-sm" style="padding-top: 2px !important;
    padding-bottom: 2px !important;">
        Update
        </button>
    </td>
<td class="text-muted small">

   <a href="javascript:void(0)"
class="view-history-btn"
data-id="{{ $row->id }}">
{{ \Carbon\Carbon::parse($row->changed_on)->timezone('Asia/Kolkata')->format('d-M-Y') }}
</a>
</td>
</tr>
 <tr class="d-none update-alert-row" id="alert-row-{{ $row->id }}">
    <td colspan="15">
        <div class="update-alert alert alert-success py-1 px-2 my-1 mb-0"></div>
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
<!-- Single History Modal -->
<div class="modal fade" id="historyModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title">Project History</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body" id="historyModalBody">
        <!-- content will be injected here by AJAX -->
        <p class="text-center text-muted">Loading...</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Add Project Modal -->
<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      
      <!-- Header -->
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="addProjectLabel">
          <i class="fas fa-plus-circle me-2"></i> Add Tender Status
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Form -->
      <form id="addProjectForm" action="{{ route('kavach_tender_status.store') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
          <input type="hidden" name="project_id" value="{{$id}}">
          <!-- Station -->
          <div class="mb-3">
            <label for="item" class="form-label fw-semibold">Select Item</label>
            <select name="item_id" id="item" class="form-select border-primary" required>
              <option value="">-- Select Station --</option>
              @foreach($item as $items)
                <option value="{{ $items->id }}">{{ $items->name }}</option>
              @endforeach
            </select>
          </div>

          <!-- Plan Head -->
          <div class="mb-3">
            <label for="section_id" class="form-label fw-semibold">Select Section</label>
            <select name="section_id" id="section_id" class="form-select border-primary" required>
              <option value="">-- Select Plan Head --</option>
              @foreach($sections as $section)
                <option value="{{ $section->id }}">{{ $section->section_name }} </option>
              @endforeach
            </select>
          </div>

          <!-- Work Type -->
          <div class="mb-3">
            <label for="tender_status" class="form-label fw-semibold">Tender Status</label>
            <select name="tender_status" id="tender_status" class="form-select border-primary" required>
              <option value="">-- Select Tender Status--</option>
              <option value="HDN">HDN</option>
              <option value="LDN">LDN</option>
              
            </select>
          </div>

      <!--     <div class="mb-3">
          <label for="tdc" class="form-label fw-semibold">TDC</label>
          <input type="date" name="tds"
          class="form-control form-control-sm datepicker-field" 
          >
          </div> -->
        </div>
        
        <!-- Footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">
            <i class="fas fa-times"></i> Close
          </button>
          <button type="submit" class="btn btn-success btn-sm">
            <i class="fas fa-save"></i> Save Project
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- <script>
document.addEventListener("DOMContentLoaded", function() {
document.querySelectorAll(".open-history").forEach(function(el) {
el.addEventListener("click", function() {
// Open modal (Bootstrap 5)
var modal = new bootstrap.Modal(document.getElementById('historyModal'));
modal.show();
});
});
});
</script> -->


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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include Select2 CSS and JS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
$(document).on('submit', '#addProjectForm', function(e) {
    e.preventDefault();
    //alert("dsdasad");
    let form = $(this);
    let url = form.attr('action');
    let formData = form.serialize();
    $.ajax({
        url: url,
        type: "POST",
        data: formData,
        success: function(response) {
            if (response.success) {
                 let messageBox = `
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                ${response.message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>`;
                $('#flash-messages').html(messageBox); 
              setTimeout(() => {
  $(".alert").alert('close');
}, 2000);
              // Close modal
                $('#addProjectModal').modal('hide');

                // Reset form
                form[0].reset();

                // Optionally: reload table without page refresh
                //location.reload(); // or use DataTable.ajax.reload() if using DataTables
            }
        },
        error: function(xhr) {
            let errors = xhr.responseJSON.errors;
            let errorMsg = "Something went wrong!";
            if (errors) {
                errorMsg = Object.values(errors).join("\n");
            }
            alert(errorMsg);
        }
    });
});
</script>
<script>
$(document).ready(function() {

  // Single modal element
  const historyModalEl = document.getElementById('historyModal');
  let historyModal = null;
  if (historyModalEl) {
    historyModal = new bootstrap.Modal(historyModalEl);
  }

  // Click handler
  $(document).on('click', '.view-history-btn', function(e) {
    e.preventDefault();

    const projectId = $(this).data('id');
    const url = "{{ url('/kavach_tender') }}/" + projectId + "/history";

    // show loader
    $('#historyModalBody').html('<p class="text-center text-muted">Loading...</p>');
    historyModal.show();

    $.ajax({
      url: url,
      type: 'GET',
      success: function(res) {
        if (res.success) {
          $('#historyModalBody').html(res.html);
        } else {
          $('#historyModalBody').html('<p class="text-danger">No history found.</p>');
        }
      },
      error: function(xhr) {
        console.error(xhr);
        $('#historyModalBody').html('<p class="text-danger">Error loading history.</p>');
      }
    });
  });

});
</script>

<script>

$(document).on("click", ".updateData", function () {
    let row = $(this).closest("tr");
    let projectId = $(this).val();

    // Collect all fields from this row
    let data = {
        id: projectId,
        _token: "{{ csrf_token() }}",
        nit_date: row.find("[data-field='nit_date']").val(),
        tender_opening_date: row.find("[data-field='tender_opening_date']").val(),
        loa_date: row.find("[data-field='loa_date']").val(),
        remarks: row.find("[data-field='remarks']").val(),
    
    };

    $.ajax({
        url: "{{ route('tender_status.updateField') }}", // your route
        method: "POST",
        data: data,
        success: function (res) {
            if (res.success) {
                let alertRow = $("#alert-row-" + projectId);
                alertRow.find(".update-alert").text(res.message);
                alertRow.removeClass("d-none").fadeIn();

                setTimeout(() => {
                    alertRow.fadeOut();
                }, 2000);
            }
        },
        error: function (xhr) {
            alert("Something went wrong!");
        },
    });
});
</script>
<script>
    $(document).ready(function() {
        $('.progress-dropdown').select2({
            width: '100%',  // ensures it adapts to your container width
            placeholder: "Select progress",
            allowClear: true
        });
    });
</script>
@include('includes.footer')