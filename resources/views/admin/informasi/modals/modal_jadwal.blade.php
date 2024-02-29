<div class="modal fade" id="modal-jadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 600px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="jadwal" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Keterangan</label>
                            {{-- <input class="form-control" type="text" name="nama" id="title"> --}}
                            <select class="form-control" name="id_pegawai" id="title">
                                <option value="0">Semua Pegawai</option>
                                @foreach ($pegawai as $pegawais )
                                <option value="{{ $pegawais->id }}">{{ $pegawais->noktp }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Dimulai</label>
                            <input class="form-control" type="datetime-local" name="tanggal_waktu" id="start_date">
                        </div>
                        <div class="form-group">
                            <label for="title">Pesan</label>
                            <input class="form-control" type="text" name="pesan" id="title">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn" value="simpan" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>