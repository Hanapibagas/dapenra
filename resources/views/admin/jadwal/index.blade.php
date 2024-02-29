@extends('backend.master')
@section('title')
Jadwal Otentikasi
@endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Jadwal Otentikasi</h2>
                <h5 class="text-white op-7 mb-2">Dana Pensiun Angkasa Pura I</h5>

            </div>
            <div class="ml-md-auto py-2 py-md-0">
                <button style="width: 100px" type="button" id="add" class="btn  btn-round btn-primary ">Add</button>
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
                        <table id="table-jadwal" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Tanggal Dimulai</th>
                                    <th>Tanggal Selesai</th>
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
@include('admin.jadwal.modals.modal_jadwal')
@endsection


@push('script')


<script>
    $('#add').on('click', function() {
        $('.modal-title').html('Tambah Jadwal');
        $('#id').val("");
        $('#title').val("");
        $('#start_date').val("");
        $('#end_date').val("");
        $('#modal-jadwal').modal('show');
        $('#btn')
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('Save')
            .val('simpan');
    });
</script>

<script>
    $('#jadwal').submit(function(e){
        e.preventDefault();
            var form = $('form');
            form.find('span').remove();
            form.find('.form-group').removeClass('is-invalid');
            form.find('.form-control').removeClass('is-invalid');
            if ($('#btn').val() == 'simpan') {
                var url = "{{route('admin.jadwal.store')}}";
                var type = "POST";
                var text = "Successfully Create Jadwal";
            }
            if ($('#btn').val() == 'update') {
                var id = $("#id").val();
                var type = "PUT";
                var url = "{{url('admin/jadwal')}}/"+ id;
                var text = "Successfully Update Jadwal";
            }

            $.ajax({
                url: url,
                type:type,
                data : form.serialize(),
                success: function (response){
                    $('#modal-jadwal').modal('hide');
                    $('#table-jadwal').DataTable().ajax.reload();
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
    $('#table-jadwal').DataTable({
        responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.jadwal.index') }}",
                columns: [
                {data: 'nama', name: 'nama'},
                {data: 'tanggal_mulai', name: 'tanggal_mulai'},
                {data: 'tanggal_akhir', name: 'tanggal_akhir'},
                {data: 'id', name: 'id',
                "render": function (data, type, row, meta) {
                        return'<div> <a href="{{url("admin/jadwal")}}/'+data+'/edit"class="btn btn-primary btn-sm  button-update" title="Edit" data-id='+data+'><i class="fa fa-edit"></i></a>  <a href="{{url("admin/jadwal")}}/'+data+'" class="btn btn-danger btn-sm delete-confirm" title="Hapus"><i class="fa fa-times"></i></a>  </div>'
                        },
                    },
            ]
    });
</script>

<script>
    $('body').on('click', '.button-update', function (event) {
        event.preventDefault();
        $('.modal-title').html('Edit Jadwal');
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
        $.get('/admin/jadwal/' + id + '/edit', function (data) {
            $('#id').val(data.data.id);
            $('#title').val(data.data.nama);
            $('#start_date').val(data.data.tanggal_mulai);
            $('#end_date').val(data.data.tanggal_akhir);
            $('#modal-jadwal').modal('show');
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
                        $('#table-jadwal').DataTable().ajax.reload();
                        swal("Good job!", "Successfully Delete Jadwal", {
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
