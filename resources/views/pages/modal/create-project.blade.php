<form id="add-project-form">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Project Title</label>
                <input type="text" class="form-control" name="title" placeholder="Project Name">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

@include('includes.js.project')
