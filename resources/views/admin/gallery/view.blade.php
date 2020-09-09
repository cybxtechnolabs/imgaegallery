@extends('admin.layout.master')
@push('after-styles')
 <!-- Custom styles for this page -->
 <link href="{{ asset('adminassets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush

@section('content')
<!-- Content Row -->
@if(session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>{{ trans(session('message'))}}</strong>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>
@endif 
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Gallery Imaged Details</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Sr. No</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $srno = 0; ?>
          @foreach($results as $gallery)
          <?php $srno++; ?>
            <tr>
              <td>{{$srno}}</td>
              <td>
                  <img src="/images/{{$gallery->gallery_id}}/{{$gallery->path}}" width="100" class="img">
              </td>
              <td>
                  <a class="btn btn-info btn-sm" href="javascript:void(0);" onclick="deleteRecord('{{$gallery->id}}')">
                      <i class="fas fa-trash">
                      </i>
                  </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Content Row -->
@endsection

@push('after-script')
 <!-- Page level plugins -->
<script src="{{ asset('adminassets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminassets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            'processing': true
        });
    });
    

    function deleteRecord(num){
        swal({
            title: "Are you sure?",
            text: "But you will still be able to retrieve this file.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, Confirm it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: false
        },
        function(isConfirm){
            if (isConfirm) {
            window.location.href = '{{URL("admin/image/")}}{{"/delete"}}/'+ num; 
            } else {
            swal("Cancelled", "Your Data file is safe :)", "error");
            }
        });
    };
</script>
@endpush