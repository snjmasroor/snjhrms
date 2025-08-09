<div class="modal fade" id="editBranchModal{{ $branch->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('branches.update', $branch->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="branchName{{ $branch->id }}" class="form-label">Branch Name</label>
                        <input type="text" class="form-control" id="branchName{{ $branch->id }}" name="name" value="{{ $branch->name }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="branchLocation{{ $branch->id }}" class="form-label">Location</label>
                        <input type="text" class="form-control" id="branchLocation{{ $branch->id }}" name="location" value="{{ $branch->location }}" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Branch</button>
                </div>
            </form>
        </div>
    </div>
</div>
