@extends('admin.app')

@section('content')
<!-- Content area -->
<div class="content">
    <div class="card">
        <div class ="card-header header-elements-inline s-filter">
            <div class="col-md-6 mb-1">
            <h6 class="card-title"><b>Courses List</b></h6></div>

            <div class="col-md-6 text-right">
                <a class="btn btn-primary btn-sm" href="{{route('courses.create')}}">
                    <i class="icon-plus-circle2 mr-2"></i> Add
                </a>
              
                <a class="btn btn-success btn-sm" href="{{ url('/admin') }}" class="text-white"> <i class="icon-circle-left2 mr-1"></i> Back</a>
				
            </div> </div>

<div class="row">
            <div class="col-md-12" align="right">
                <div class="form-group d-flex fr-stus">
                    <label><b>Level : </b></label>
                    <select id="Status" class="form-control" style="width: 250px">
                        <option value="">All</option>
                        <option value="1">Level 1</option> 
                        <option value="2">Level 2</option>
                        <option value="3">Level 3</option>
                        <option value="4">Level 4</option>
                        <option value="6">Level 6</option>
                        <option value="7">Level 7</option>
                        <option value="">University Courses </option>
                    </select>           			
                </div>
            </div>
</div>


      
        
        <table class="table get_courses_data">
            <thead>
                <tr>
                    <th>S.No.</th>
                    <th>NAME</th>
                    <th>IMAGE</th>
                    <th>TYPE</th>
                    <th>STATUS</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>  </div>
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
        var dataTable = $('.get_courses_data').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            pageLength: 7,
            scrollX: true,
            "order": [[ 0, "desc" ]],
            ajax: {
                url : "{{ url('/admin/courses') }}",
                data: function(d){
                        d.Status = $('#Status').val(),
                        d.search = $('input[type="search"]').val()
                    }
                },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {data: 'name', name: 'name'},
                {data: 'image', name: 'image',
                    render: function( data, type, full, meta ) {
                        return "<img src=" + data + " height=\"60\"  width=\"80\" alt='No Image'/>";
                    }
                },
                {data: 'course_type', name: 'course_type'},
                {data: 'status', name: 'status'},
                {data: 'Actions', name: 'Actions',orderable:false,serachable:false}
            ]
        });
        
        $('#Status').on('change',function(e){
            dataTable.draw();
        });
        
        $('body').on('click', '.delete-courses', function () {
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
                        url : "{{ url('/admin/courses') }}"+'/'+id,
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