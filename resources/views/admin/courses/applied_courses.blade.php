@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        <div class="card-header header-elements-inline s-filter">
            <div class="col-md-6">
                <h6 class="card-title"><b>Applied-Courses User List</b></h6>
            </div>
            <div class="col-md-6 text-right">
				<a href="{{ url('/admin') }}" class="btn-success"> <i class="icon-circle-left2 mr-1"></i> Back</a>
            </div>
        </div>
        
        <table class="table get_applied_courses">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>COURSE NAME</th>
                    <th>USER NAME</th>
                    <th>USER EMAIL</th>
                    <th>ACTION</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/admin/global_assets/js/plugins/tables/datatables/datatables.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // init datatable.
        var dataTable = $('.get_applied_courses').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 7,
            scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: "{{ url('/admin/applied_courses') }}",
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'coursename', name: 'coursename'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'users.email'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false}
            ]
        });
        
        $('body').on('click', '.delete-applied_courses', function () {
            var id = $(this).attr('data-id');
            swalInit.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, cancel it!',
                cancelButtonText: 'No, do not cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function(result) {
                if(result.value) {
                    $.ajax({
                        type:'DELETE',
                        url : "{{ url('/admin/applied_courses') }}"+'/'+id,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function (response) {
                            swalInit.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            .then((willDelete) => {
                                location.reload();
                            });
                        },
                        error: function (response) {
                            swalInit.fire(
                                'Error deleting!',
                                'Please try again!',
                                'error'
                            )
                        }
                    });
                }
                else if (result.dismiss === swal.DismissReason.cancel) {
                    swalInit.fire(
                        'Cancelled',
                        'Your imaginary file is safe.',
                        'error'
                    )
                }
            });
        });
    });
</script>
@endsection
<!-- ========== table components end ========== -->