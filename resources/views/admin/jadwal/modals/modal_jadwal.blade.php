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
                            <input class="form-control" type="text" name="nama" id="title">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Dimulai</label>
                            <input class="form-control" type="date" name="tanggal_mulai" id="start_date">
                        </div>
                        <div class="form-group">
                            <label for="start_date">Tanggal Berakhir</label>
                            <input class="form-control" type="date" name="tanggal_akhir" id="end_date">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="id" id="id">
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
