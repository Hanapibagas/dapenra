<div class="modal fade" id="modal-welcome-speech" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 800px">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form id="welcome-speech" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" placeholder="Name....">
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea id="content" class="form-control " name="content"
                                placeholder="Content..."></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input class="form-control" type="file" name="image" id="image">
                            <p id="img"></p>
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