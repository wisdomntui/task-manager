<form id="delete-task-form">
    <input type="hidden" name="id">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-12">
                <p>
                    Delete this task?
                </p>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Yes</button>
    </div>
</form>

@include('includes.js.task-delete')