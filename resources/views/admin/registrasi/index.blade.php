@extends('backend.master')
@section('title')
registrasi
@endsection

@section('content')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Data Registrasi Aplikasi Otentikasi</h2>
                <h5 class="text-white op-7 mb-2">Dana Pensiun Angkasa Pura I</h5>

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
                        <table id="table-registrasi" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama Penerima</th>
                                    <th>Jenis Manfaat</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Telepon</th>
                                    <th>Telepon Kerabat</th>
                                    <th>Foto Depan</th>
                                    <th>Foto Kiri</th>
                                    <th>Foto Kanan</th>
                                    <th>Foto Atas</th>
                                    <th>Foto Bawah</th>
                                    <th>Dokumen</th>
                                    <th>Status</th>
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
@include('admin.registrasi.modals.modal_registrasi')
@endsection


@push('script')


<script>
    $('#add').on('click', function() {
        $('.modal-title').html('TambahRegistrasi');
        $('#id').val("");
        $('#title').val("");
        $('#start_date').val("");
        $('#end_date').val("");
        $('#modal-registrasi').modal('show');
        $('#btn')
            .removeClass('btn-info')
            .addClass('btn-primary')
            .html('Save')
            .val('simpan');
    });
</script>

<script>
    $('#registrasi').submit(function(e){
        e.preventDefault();
            var form = $('form');
            form.find('span').remove();
            form.find('.form-group').removeClass('is-invalid');
            form.find('.form-control').removeClass('is-invalid');
            if ($('#btn').val() == 'simpan') {
                var url = "{{route('admin.registrasi.store')}}";
                var type = "POST";
                var text = "Successfully CreateRegistrasi";
            }
            if ($('#btn').val() == 'update') {
                var id = $("#id").val();
                var type = "PUT";
                var url = "{{url('admin/registrasi')}}/"+ id;
                var text = "Successfully UpdateRegistrasi";
            }

            $.ajax({
                url: url,
                type:type,
                data : form.serialize(),
                success: function (response){
                    $('#modal-registrasi').modal('hide');
                    $('#table-registrasi').DataTable().ajax.reload();
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
    $('#table-registrasi').DataTable({
        responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.registrasi.index') }}",
                columns: [
                {data: 'nik', name: 'nik'},
                {data: 'nama_penerima', name: 'nama_penerima'},
                {data: 'jenis_manfaat', name: 'jenis_manfaat'},
                {data: 'tempat_lahir', name: 'tempat_lahir'},
                {data: 'tanggal_lahir', name: 'tanggal_lahir'},
                {data: 'alamat', name: 'alamat'},
                {data: 'telepon', name: 'telepon'},
                {data: 'telepon_kerabat', name: 'telepon_kerabat'},
                {data: 'depan', name: 'kodepos'},
                {data: 'kiri', name: 'stkwn'},
                {data: 'kanan', name: 'nourut_p'},
                {data: 'atas', name: 'nama_p'},
                {data: 'bawah', name: 'jenkel_p'},
                {data: 'dokumen', name: 'tanggal_lahir_p'},
                {data: 'status', name: 'status_p'},
                {data: 'id', name: 'id',
                "render": function (data, type, row, meta) {
                        return'<div> <a href="{{url("admin/registrasi")}}/'+data+'/edit"class="btn btn-primary btn-sm  button-update" title="Edit" data-id='+data+'><i class="fa fa-edit"></i></a>  <a href="{{url("admin/registrasi")}}/'+data+'" class="btn btn-danger btn-sm delete-confirm" title="Hapus"><i class="fa fa-times"></i></a>  </div>'
                        },
                    },
            ]
    });
</script>

<script>
    $('body').on('click', '.button-update', function (event) {
        event.preventDefault();
        $('.modal-title').html('EditRegistrasi');
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
        $.get('/admin/registrasi/' + id + '/edit', function (data) {
            $('#id').val(data.data.id);
            $('#title').val(data.data.nama);
            $('#start_date').val(data.data.tanggal_mulai);
            $('#end_date').val(data.data.tanggal_akhir);
            $('#modal-registrasi').modal('show');
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
                        $('#table-registrasi').DataTable().ajax.reload();
                        swal("Good job!", "Successfully DeleteRegistrasi", {
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
