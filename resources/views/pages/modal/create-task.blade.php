<form id="add-task-form">
    <div class="modal-body">
        <div class="row g-3">
            <div class="col-12">
                <div class="alert alert-success d-none" id="task-alert">Project created successfully.</div>
                <label for="inputAddress" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Task Name">
                <span id="task-name-error-msg" class="text-danger"></span>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Project</label>
                <select class="form-select" aria-label="Default select example" name="project">
                    @foreach($projects as $key => $val)
                        <option value="{{$key}}">{{$val}}</option>
                    @endforeach
                </select>
                <span id="task-proj-error-msg" class="text-danger"></span>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Task Description</label>
                <div class="form-floating">
                    <textarea name="description" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Description</label>
                </div>
                <span id="task-desc-error-msg" class="text-danger"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
</form>

@include('includes.js.task')
