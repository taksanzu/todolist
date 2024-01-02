
<!-- Modal -->
<div class="modal fade" id="priorityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Priority</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="clearPriority()"></button>
            </div>
            <input type="hidden" name="id" id="id">
            <div class="modal-body">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name"/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="clearPriority()">Close</button>
                <a id="prioritySaves" type="submit" class="btn btn-primary">Save</a>
            </div>
        </div>
    </div>
</div>
