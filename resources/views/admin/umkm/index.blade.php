@extends('backend.master')
@section('title')
Tour
@endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">UMKM</h2>
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
                        <table id="table-umkm" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Deskripsi</th>
                                    <th>Alamat</th>
                                    <th>Gambar</th>
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
@include('admin.umkm.modals.modal_umkm')
@endsection


@push('script')

<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>

<script>
    let appEditor;
    ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        appEditor = editor;
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
    $('#add').on('click', function() {
        appEditor.setData("");
        $('#img').html('')
        $('.modal-title').html('Tambah Umkm');
        $('#id').val("");
        $('#name').val("");
        $('#image').val("");
        $('#address').val("");
        $('#modal-umkm').modal('show');
        $('#btn')
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('Save')
            .val('simpan');
    });
</script>

<script>
    $('#umkm').submit(function(e){
        e.preventDefault();
            var form = $('form');
            form.find('span').remove();
            form.find('.form-group').removeClass('is-invalid');
            form.find('.form-control').removeClass('is-invalid');

            var formData = new FormData(this);    

            if ($('#btn').val() == 'simpan') {
                var url = "{{route('admin.umkm.store')}}";
                var text = "Successfully Create Umkm";
            }

            if ($('#btn').val() == 'update') {
                var url = "{{route('admin.update-umkm')}}";
                var text = "Successfully Update Umkm";
            }

            $.ajax({
                url: url,
                type:'POST',
                processData: false,
                contentType: false,
                data: formData,
                success: function (response){
                    $('#modal-umkm').modal('hide');
                    $('#table-umkm').DataTable().ajax.reload();
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
    $('#table-umkm').DataTable({
        responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.umkm.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'description', name: 'description'},
                    {data: 'address', name: 'address'},
                    {data: 'image', name: 'image'},
                {data: 'id', name: 'id',
                "render": function (data, type, row, meta) {
                        return' <a href="{{url("admin/umkm")}}/'+data+'/edit"class="btn btn-primary btn-sm  button-update" title="Edit" data-id='+data+'><i class="fa fa-edit"></i></a>  <a href="{{url("admin/umkm")}}/'+data+'" class="btn btn-danger btn-sm delete-confirm" title="Hapus"><i class="fa fa-times"></i></a>'
                        },
                    },
            ]
    });
</script>

<script>
    $('body').on('click', '.button-update', function (event) {
        event.preventDefault();
        $('.modal-title').html('Edit Welcome Speech');
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
        $.get('/admin/umkm/' + id + '/edit', function (data) {
            $('#img').html('')
            $('#id').val(data.data.id);
            $('#name').val(data.data.name);
            $('#address').val(data.data.address);
            appEditor.setData(data.data.description);
            $('#img').val(data.image);
            if (data.image) {
                $('#img').append(`<img class="mt-3" width="80px" height="80px" src="${data.image}" alt="Image Management Structure">`);
            } else {
                $('#img').html("Nothing Image")
            }
            $('#modal-umkm').modal('show');
        })
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
                        $('#table-umkm').DataTable().ajax.reload();
                        swal("Good job!", "Successfully Delete Umkm", {
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

@endpush