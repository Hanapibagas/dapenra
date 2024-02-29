<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <form action="{{ route('admin.importdata') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Data Excel</label>
                            <input class="form-control" type="file" name="name" id="title">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn" value="import" class="btn btn-primary">Import</button>
                        </div>
                    </form>
                    {{-- <form id="pegawai" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Data Excel</label>
                            <input class="form-control" type="file" name="name" id="title">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btn" value="import" class="btn btn-primary">Import</button>
                        </div>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>
