@include('includes.header')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<script> AOS.init(); </script>

<style>
.text-white{ text-shadow:1px 1px 0 #000,2px 2px 4px rgba(0,0,0,.4) }
.form-label{ text-shadow:1px 1px 0 #fff,2px 2px 4px rgba(0,0,0,.3) }
table tbody tr td{ text-shadow:1px 1px 0 #fff,2px 2px 4px rgba(0,0,0,.3) }
.custom-view-btn{border:1px solid #0d6efd;color:#0d6efd;background:#e9f2ff;border-radius:6px;transition:.3s}
.custom-view-btn:hover{background:#0d6efd;color:#fff}
.custom-download-btn{border:1px solid #198754;color:#198754;background:#e9f8f0;border-radius:6px;transition:.3s}
.custom-download-btn:hover{background:#198754;color:#fff}
.dashboard-card{display:flex;align-items:center;gap:15px;padding:20px 20px 20px 24px;border-radius:1.25rem;color:#fff;box-shadow:0 8px 20px rgba(0,0,0,.15);transition:.3s;cursor:pointer;position:relative;border-left:6px solid transparent}
.dashboard-card:hover{transform:translateY(-6px) scale(1.01);box-shadow:0 12px 25px rgba(0,0,0,.25);filter:brightness(1.05)}
.icon-box{background:rgba(255,255,255,.15);padding:14px;border-radius:25%;font-size:22px;box-shadow:inset 2px 2px 5px rgba(0,0,0,.2), inset -2px -2px 6px rgba(255,255,255,.1);text-shadow:1px 1px 2px rgba(0,0,0,.3)}
.card-title{margin:0;font-size:14px;font-weight:500;text-transform:uppercase;opacity:.9}
.card-count{margin:0;font-size:28px;font-weight:700;text-shadow:1px 1px 3px rgba(0,0,0,.3)}
.card-purple{background:linear-gradient(135deg,#6f42c1,#4a2a91);border-left:6px solid #c79ef7}
.card-blue{background:linear-gradient(135deg,#0d6efd,#084298);border-left:6px solid #66c2ff}
.card-green{background:linear-gradient(135deg,#198754,#145c32);border-left:6px solid #72e3b2}
.card-orange{background:linear-gradient(135deg,#fd7e14,#c75b05);border-left:6px solid #ffc187}
.card-red{background:linear-gradient(135deg,#ff4b2b,#b31217);border-left:6px solid #ff9a8b}
canvas{background:#fff;border-radius:1.5rem !important;box-shadow:inset 1px 1px 4px rgba(0,0,0,.06),4px 4px 14px rgba(0,0,0,.18);padding:1rem}
.card h5{font-weight:700;color:#2d2d2d;text-shadow:1px 1px 0 #fff,2px 2px 6px rgba(0,0,0,.3)}
.card h2{text-shadow:1px 1px 0 #fff,2px 2px 6px rgba(0,0,0,.3)}
#datatablesSimple th,#datatablesSimple td{border:1px solid #dee2e6 !important;padding:0px 20px !important;vertical-align:middle}
.card-body{flex:1 1 auto;padding:0rem 10px !important}
.card-header{padding:.1rem 1rem !important}
.table-header{background:linear-gradient(90deg,#007bff,#00c4ff);color:#fff;font-weight:bold;font-size:15px;text-transform:uppercase}
.custom-table tbody tr:nth-child(odd){background:#f9fcff}
.custom-table tbody tr:nth-child(even){background:#eef6fb}
.custom-table tbody tr:hover{background:#dff0ff !important;transition:.3s}
.custom-table{border-radius:12px;overflow:hidden}
.custom-table input:focus{border-color:#007bff;box-shadow:0 0 4px #007bff66;transition:.2s}
.btn-success:hover{background:#28a745;box-shadow:0 4px 10px rgba(0,128,0,.3);transform:translateY(-1px);transition:.2s}
thead{color:#000 !important;text-shadow:none !important;background:#bbcde5 !important}
</style>

<div id="layoutSidenav_content">
<main>
<div class="container-fluid px-4 mt-5" style="margin-bottom:100px;">

@if(session('success'))
  <div class="alert alert-success" id="success-alert">{{ session('success') }}</div>
  <script>
    setTimeout(function(){
      let a=document.getElementById('success-alert');
      if(a){ a.style.transition="opacity .5s ease"; a.style.opacity="0"; setTimeout(()=>a.remove(),500); }
    },3000);
  </script>
@endif

<h3 class="mb-3 fw-bold text-left text-dark">
   List
  <button type="button" class="btn btn-success btn-sm px-3 shadow-sm" style="float:right;"
          data-bs-toggle="modal" data-bs-target="#addObubModal">
    Add 
  </button>
</h3>

<form action="#" method="POST">
@csrf
<div class="table-responsive">
<table class="table table-bordered table-hover align-middle shadow-sm custom-table">
  <thead class="table-header">
    <tr>
      <th>SN</th>
      <th style="text-align:left;">Div.</th>
      <th style="text-align:left;">LC No.</th>
      <th style="text-align:left;">Local Name of LC</th>
      <th style="text-align:left;">State</th>
      <th style="text-align:left;">District</th>
      <th style="text-align:left;">TVU Date</th>
      <th style="text-align:left;">Block Section (Km)</th>
      <th style="text-align:left;">Major Section</th>
      <th style="text-align:left;">Executing Agency</th>
      <th style="text-align:left;">Sr.DEN/DEN</th>
      <th style="text-align:left;">Sanctioned details (PB/DP/NHAI/Year)</th>
      <th style="text-align:left;">Work Type (ROB/RUB)</th>
      <th>GAD Approval</th>
      <th>Estimate Sanction</th>
      <th>Sanctioned cost (Cr.)</th>
      <th>Award of Tender</th>
      <th>Sanction with Cost Sharing (Y/N)</th>
      <th>Land Acquisition</th>
      <th>% Phy. Prog.</th>
      <th>% Financial Prog.</th>
      <th>GQGD 'A' Route</th>
      <th>PMO monitored</th>
      <th>LC Location</th>
      <th>Target (Y/N)</th>
      <th>TDC</th>
      <th>TDC (FY)</th>
      <th>Brief Remarks</th>
      <th>Target ROB</th>
      <th>Target RUB</th>
      <th>Completion Date</th>
      <th>LC Elimination Date</th>
      <th>Action</th>
      <th>Updated</th>
    </tr>
  </thead>

  <tbody>
  @foreach($rows as $row)
    <tr>
      <td>{{ $loop->iteration }}</td>

      {{-- Read-only (form fields) --}}
      <td style="text-align:left;">{{ $row->div_id }}</td>
      <td style="text-align:left;">{{ $row->lc_no }}</td>
      <td style="text-align:left;">{{ $row->local_name ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->state->name ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->district->name ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->tvu_date }}</td>
      <td style="text-align:left;">{{ $row->block_sec_km }}</td>
      <td style="text-align:left;">{{ $row->majorSection->name ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->agency->name ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->engg_officer ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->sanc_details ?? '-' }}</td>
      <td style="text-align:left;">{{ $row->work_type ?? '-' }}</td>

      {{-- Inline editable from here --}}
      
      @php $yn = [''=>'--','Y'=>'Y','N'=>'N']; @endphp

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="gad_app">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->gad_app===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="est_sanct">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->est_sanct===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td><input class="form-control form-control-sm" value="{{ $row->sanc_cost }}" data-id="{{ $row->id }}" data-field="sanc_cost"></td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="award_tender">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->award_tender===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      @php $yn = [''=>'--','Y'=>'Y','N'=>'N']; @endphp

<td>
  <select class="form-control form-control-sm"
          data-id="{{ $row->id }}" data-field="sanc_cost_sharing">
    @foreach($yn as $k => $v)
      <option value="{{ $k }}" {{ $row->sanc_cost_sharing === $k ? 'selected' : '' }}>{{ $v }}</option>
    @endforeach
  </select>
</td>


      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="land_acqu">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->land_acqu===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td><input type="number" min="0" max="100" class="form-control form-control-sm" value="{{ $row->phy_prog }}" data-id="{{ $row->id }}" data-field="phy_prog"></td>
      <td><input type="number" min="0" max="100" class="form-control form-control-sm" value="{{ $row->finan_prog }}" data-id="{{ $row->id }}" data-field="finan_prog"></td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="gqgd">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->gqgd===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="pmo">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->pmo===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="lc_location">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->lc_location===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
  <select class="form-control form-control-sm"
          data-id="{{ $row->id }}" data-field="target">
    @foreach($yn as $k => $v)
      <option value="{{ $k }}" {{ $row->target === $k ? 'selected' : '' }}>{{ $v }}</option>
    @endforeach
  </select>
</td>


      <td><input class="form-control form-control-sm" value="{{ $row->tdc }}" data-id="{{ $row->id }}" data-field="tdc"></td>
      <td><input class="form-control form-control-sm" value="{{ $row->tdc_fy }}" data-id="{{ $row->id }}" data-field="tdc_fy"></td>
      <td><input class="form-control form-control-sm" value="{{ $row->brief_remarks }}" data-id="{{ $row->id }}" data-field="brief_remarks"></td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="target_rob">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->target_rob===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
        <select class="form-control form-control-sm" data-id="{{ $row->id }}" data-field="target_rub">
          @foreach($yn as $k=>$v)<option value="{{ $k }}" {{ $row->target_rub===$k?'selected':'' }}>{{ $v }}</option>@endforeach
        </select>
      </td>

      <td>
        <input type="date" class="form-control form-control-sm"
               value="{{ $row->completion_date ? \Carbon\Carbon::parse($row->completion_date)->format('Y-m-d') : '' }}"
               data-id="{{ $row->id }}" data-field="completion_date">
      </td>

      <td>
        <input type="date" class="form-control form-control-sm"
               value="{{ $row->lc_elim_date ? \Carbon\Carbon::parse($row->lc_elim_date)->format('Y-m-d') : '' }}"
               data-id="{{ $row->id }}" data-field="lc_elim_date">
      </td>

      <td>
        <button type="button" value="{{ $row->id }}" class="btn btn-success updateData btn-sm px-3 shadow-sm">Update</button>
      </td>

      
      <td class="text-muted small">
        <a href="javascript:void(0)"
class="view-history-btn"
data-id="{{ $row->id }}">
{{ \Carbon\Carbon::parse($row->updated_on)->timezone('Asia/Kolkata')->format('d-M-Y H:i') }}
</a>

</td>

    </tr>

    <tr class="d-none update-alert-row" id="alert-row-{{ $row->id }}">
      <td colspan="30">
        <div class="update-alert alert alert-success py-1 px-2 my-1 mb-0"></div>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</form>

</div>
</main>
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
{{-- Add OBUB Modal --}}
<div class="modal fade" id="addObubModal" tabindex="-1" aria-labelledby="addObubLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-3">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title fw-bold" id="addObubLabel">
          <i class="fas fa-plus-circle me-2"></i> Add Record
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form id="addObubForm" action="{{ route('obub.store') }}" method="POST">
        @csrf
        <div class="modal-body p-4">
          <div class="row g-3">
            <div class="col-md-2">
  <label class="form-label fw-semibold">Div.</label>
  <select name="div_id" id="div_id" class="form-select border-primary" required>
    <option value="">-- Select Div --</option>
    @foreach($divisions as $d)
      <option value="{{ $d->code }}">{{ $d->code }}</option>
    @endforeach
  </select>
</div>


            <div class="col-md-3">
              <label class="form-label fw-semibold">LC No.</label>
              <input type="text" name="lc_no" class="form-control border-primary">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Local Name of LC</label>
              <input type="text" name="local_name" class="form-control border-primary">
            </div>

            <div class="col-md-3">
              <label class="form-label fw-semibold">State</label>
              <select name="state_id" id="state_id" class="form-select border-primary" required>
                <option value="">-- Select State --</option>
                @foreach($states as $s)
                  <option value="{{ $s->id }}">{{ $s->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label fw-semibold">District</label>
              <select name="dist_id" id="dist_id" class="form-select border-primary" required>
                <option value="">-- Select District --</option>
                @foreach($districts as $d)
                  <option value="{{ $d->id }}" data-state="{{ $d->state_id }}">{{ $d->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-3">
              <label class="form-label fw-semibold">TVU Date</label>
              <input type="text" name="tvu_date" class="form-control border-primary" placeholder="e.g. 104615 Dt. 08/2021">
            </div>

            <div class="col-md-3">
              <label class="form-label fw-semibold">Block Section (Km)</label>
              <input type="text" name="block_sec_km" class="form-control border-primary">
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Major Section</label>
              <select name="major_section_id" id="major_section_id" class="form-select border-primary">
                <option value="">-- Select --</option>
                @foreach($majorSections as $ms)
                  <option value="{{ $ms->id }}">{{ $ms->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Executing Agency</label>
              <select name="exe_agency_id" id="exe_agency_id" class="form-select border-primary" required>
                <option value="">-- Select Agency --</option>
                @foreach($agencies as $ag)
                  <option value="{{ $ag->id }}">{{ $ag->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-md-4">
              <label class="form-label fw-semibold">Sr.DEN/DEN</label>
              <input type="text" name="engg_officer" class="form-control border-primary">
            </div>

            <div class="col-md-6">
              <label class="form-label fw-semibold">Sanctioned details (PB/DP/NHAI/Year)</label>
              <input type="text" name="sanc_details" class="form-control border-primary">
            </div>

            <div class="col-md-3">
              <label class="form-label fw-semibold">Work Type</label>
              <select name="work_type" class="form-select border-primary">
                <option value="">--</option>
                <option value="ROB">ROB</option>
                <option value="RUB">RUB</option>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success btn-sm">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>
</div>
{{-- filter districts by state (frontend) --}}
<script>
$(document).on('change','#state_id', function() {
  const sid = $(this).val();
  $('#dist_id option').each(function(){
    const ok = !sid || $(this).data('state') == sid || !$(this).data('state');
    $(this).toggle(ok);
  });
  $('#dist_id').val('');
});
</script>

{{-- AJAX: create --}}
<script>
$(document).on('submit', '#addObubForm', function(e) {
  e.preventDefault();
  let form = $(this);
  $.ajax({
    url: form.attr('action'),
    type: "POST",
    data: form.serialize(),
    success: function(res){
      if(res.success){
        alert(res.message);
        $('#addObubModal').modal('hide');
        form[0].reset();
        location.reload();
      }
    },
    error: function(xhr){
      let errs = xhr.responseJSON?.errors;
      alert(errs ? Object.values(errs).join("\n") : "Error");
    }
  });
});
</script>

{{-- AJAX: inline update (same button pattern) --}}
<script>
$(document).on('click', '.updateData', function () {
  let row = $(this).closest('tr');
  let id  = $(this).val();

  let fields = {};

  // collect only changed values
  row.find('input, select, textarea').each(function() {
    const f = $(this).data('field');
    if (f) {
      let currentVal = $(this).val();
      let originalVal = $(this).attr('data-original');

      if (currentVal !== originalVal) {
        fields[f] = currentVal;
      }
    }
  });

  if ($.isEmptyObject(fields)) {
    alert("No changes to update.");
    return;
  }

  $.ajax({
    url: "{{ route('obub.updateField') }}",
    type: "POST",
    data: { id:id, fields:fields, _token:'{{ csrf_token() }}' },
    success: function(res){
      if(res.success){
        let alertRow = $("#alert-row-"+res.id);
        alertRow.find('.update-alert').text(res.message);
        alertRow.removeClass('d-none').fadeIn();
        setTimeout(()=>alertRow.fadeOut(),2000);

        // update original values
        row.find('input, select, textarea').each(function() {
          const f = $(this).data('field');
          if (f && fields[f] !== undefined) {
            $(this).attr('data-original', fields[f]);
          }
        });
      }
    },
    error: function(){ alert('Error updating record'); }
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
    const url = "{{ url('/obub-data') }}/" + projectId + "/history";

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

@include('includes.footer')
