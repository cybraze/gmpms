@include('includes.header')
 <!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- AOS for form animation -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
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
border: 1px solid #8B0000;
color: #842029;
background-color: #f2e5e5;
border-radius: 6px;
transition: all 0.3s ease;
}
.custom-download-btn:hover {
background-color: #8B0000;
color: #fff;

}
.datatable-selector {
padding: 6px;
border-radius: 5px !important;
}
.datatable-input {
border-radius: 10px !important;
padding: 6px 12px;
}
</style>
<div id="layoutSidenav_content">
  <main>

  <div class="container-fluid px-4" style="margin-top: 50px;">
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








 <div class="card border-0 shadow mb-5" style="border-radius: 1rem;" data-aos="fade-up">
  <div class="card-header text-white fw-bold d-flex align-items-center"
  style="background: linear-gradient(to right, #5780bf, #5780bf);border-radius: 1rem 1rem 0 0;">
  <i class="bi bi-folder-plus me-2 fs-5"></i>Create New Project
  </div>

  <div class="card-body bg-light px-4">
  
 <form method="POST" action="{{ route('new_project.store') }}">
        @csrf
        <div class="row">
        
        <div class="col-md-4">
            <label class="form-label">Project Name</label>
            <input type="text" class="form-control" name="project_name" placeholder="Enter Project Name" required>
        </div>
        
     
    <div class="col-md-4" style="margin-top: 31px;">
      <button type="submit" class="btn w-100 shadow-sm" style="color: #fff;border-radius: 50px;
      background: linear-gradient(to right, #5780bf, #5780bf);">
      <i class="bi bi-filter-circle me-1"></i> Save
      </button>
    </div>
    
  </div>
  </form>

  </div>
  </div>











  <!-- Project Listing -->
  <div class="card border-0 shadow mb-5" style="border-radius: 1rem;" data-aos="fade-up">
  <div class="card-header text-white fw-bold d-flex align-items-center"
  style="background: linear-gradient(to right, #5780bf, #5780bf);border-radius: 1rem 1rem 0 0;">
  <i class="bi bi-folder-plus me-2 fs-5"></i>List of New Project
  </div>

  <div class="card-body bg-light px-4">
  <div class="table-responsive">
  <table id="datatablesSimple" class="table table-bordered text-center align-middle shadow-sm"
  style="font-size: 14px; border-radius: .75rem; overflow: hidden;">
  <thead >
  <tr>
  <th>Sr.No.</th>
  <th>Project Name</th>
  <th>Actions</th>

  </tr>
  </thead>
<tbody>
                @foreach($projects as $index => $project)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $project->project_name }}</td>
                   <td>
  <a href="{{ route('project_sheets.show', $project->id) }}"
     class="btn btn-sm btn-primary me-2 shadow custom-view-btn">
    <i class="bi bi-pencil-square"></i> Open
  </a>
</td>
                </tr>
                @endforeach
            </tbody>

  </table>
  </div>
  </div>
  </div>
  </div>
  </main>
    <style>
.modal-content {
  box-shadow: 0 0 15px rgba(0, 0, 0, 0.4);
  animation: fadeInUp 0.4s ease;
}
@keyframes fadeInUp {
  from {
    transform: translateY(50px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}



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
    </style>



<!-- Extra Styles -->
<style>
.input-icon-wrapper {
  position: relative;
}

.input-icon {
  position: absolute;
  top: 50%;
  left: 12px;
  transform: translateY(-50%);
  color: #2d523d;
  font-size: 1rem;
  z-index: 2;
}

.stylish-input {
  padding-left: 40px;
  border: 2px solid #2d523d;
  border-radius: 10px;
  transition: all 0.3s ease;
  box-shadow: none;
}

.stylish-input:focus {
  outline: none;
  border-color: #28a745;
  box-shadow: 0 0 0 0.15rem rgba(40, 167, 69, 0.25);
  transform: scale(1.02);
}
</style>

@include('includes.footer')
