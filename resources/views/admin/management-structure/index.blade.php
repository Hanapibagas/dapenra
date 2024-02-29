@extends('backend.master')
@section('title')
About
@endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Management Structure</h2>
                <h5 class="text-white op-7 mb-2">Masata</h5>
            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button style="width: 100px" type="button" id="add" class="btn  btn-round btn-secondary ">Add</button>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table-management-structure" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.management-structure.modals.modal_management_structure')
@endsection


@push('script')


<script>
    $('#add').on('click', function() {
        $('.modal-title').html('Tambah Struktur Pengurus');
        $('#modal-management-structure').modal('show');
        $('#image').val("");
        $('#btn')
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('Save')
            .val('simpan');
    });
</script>

<script>
    $('#management-structure').submit(function(e){
        e.preventDefault();
            var form = $('form');
            form.find('span').remove();
            form.find('.form-group').removeClass('is-invalid');
            form.find('.form-control').removeClass('is-invalid');
            if ($('#btn').val() == 'simpan') {
                var url = "{{route('admin.managementstructures.store') }}";
                var text = "Successfully Create Management Structure";
            }
            if ($('#btn').val() == 'update') {
                var url = "{{route('admin.update-management-structure') }}";
                var text = "Successfully Update Management Structure";
            }
            var formData = new FormData(this);    
            $.ajax({
                url: url,
                type:'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response){
                    $('#modal-management-structure').modal('hide');
                    $('#table-management-structure').DataTable().ajax.reload();
                    swal("Good job!", text, {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                },
                error: function(xhr){
                    var res = xhr.responseJSON;
                    if ($.isEmptyObject(res) == false) {
                    $.each(res.errors, function (key, value) {
                    $('#' + key).closest('.form-group').addClass('is-invalid').append('<span class="is-invalid text-danger"><strong>'+ value
                            +'</strong></span>');
                    $('#' + key).closest('.form-control').addClass('is-invalid');
                    })
                    }
                }
            })
        });
</script>

<script>
    $('#table-management-structure').DataTable({
        responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.managementstructures.index') }}",
                columns: [
                {data: 'image', name: 'image'},
                {data: 'id', name: 'id',
                "render": function (data, type, row, meta) {
                        return'<div> <a href="{{url("admin/managementstructures")}}/'+data+'/edit"class="btn btn-primary btn-sm  button-update" title="Edit" data-id='+data+'><i class="fa fa-edit"></i></a>  <a href="{{url("admin/managementstructures")}}/'+data+'" class="btn btn-danger btn-sm delete-confirm" title="Hapus"><i class="fa fa-times"></i></a>  </div>'
                        },
                    },
            ]
    });
</script>


<script>
    $('body').on('click', '.delete-confirm', function (event) {
        event.preventDefault();
    
        var me = $(this),
            url = me.attr('href'),
            title = me.attr('title'),
            csrf_token = $('meta[name="csrf-token"]').attr('content');
            swal({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					type: 'warning',
					buttons:{
						confirm: {
							text : 'Yes, delete it!',
							className : 'btn btn-success'
						},
						cancel: {
							visible: true,
							className: 'btn btn-danger'
							}
						}
        }).then((Delete) => {
            if(Delete){
                $.ajax({
                    url : url,
                    type : 'POST',
                    data : {
                        '_method' : 'DELETE',
                        '_token' : csrf_token
                    },
                    success: function(response){
                        $('#table-management-structure').DataTable().ajax.reload();
                        swal("Good job!", "Successfully Delete Management Structure", {
						icon : "success",
						buttons: {        			
							confirm: {
								className : 'btn btn-success'
							}
						},
					});
                    },
                    error: function(xhr){
                        swal("Oops....!", "Something went wrong!", {
						icon : "error",
						buttons: {        			
							confirm: {
								className : 'btn btn-danger'
							}
						},
					});
                    }
                })
            }
        })
    
});
</script>


<script>
    $('body').on('click', '.button-update', function (event) {
        event.preventDefault();
        $('.modal-title').html('Edit Fraksi');
        $('#btn')
            .removeClass('btn-primary')
            .addClass('btn-info')
            .html('Update')
            .val('update');
        $('#btn-cancel')
            .removeClass('btn-outline-primary')
            .addClass('btn-outline-info')
            .text('Batal');
        let id = $(this).data('id');
        $.get('/admin/managementstructures/' + id + '/edit', function (data) {
            $('#img').html('')
            $('#id').val(data.data.id);
            $('#img').val(data.image);
            if (data.image) {
                $('#img').append(`<img class="mt-3" width="60px" height="60px" src="${data.image}" alt="Image Management Structure">`);
            } else {
                $('#img').html("Nothing Image")
            }
            $('#modal-management-structure').modal('show');
        })
    });
</script>


@endpush