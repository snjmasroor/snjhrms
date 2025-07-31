<!-- Edit Department-->
        <!-- Edit Department Modal -->
<div class="modal fade" id="depedit{{ $department->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
        <div class="modal-content">
            <form action="{{ route('admin.departments.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Edit Department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Department Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $department->name }}" required>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-sm-6">
                            <label class="form-label">Department Head</label>
                            <select name="head" class="form-select">
                                <option value="" {{ $department->head == null ? 'selected' : 'Masroor' }}>Select Head</option>
                                <option value="Joan Dyer" {{ $department->head == 'Joan Dyer' ? 'selected' : '' }}>Joan Dyer</option>
                                <option value="Ryan Randall" {{ $department->head == 'Ryan Randall' ? 'selected' : '' }}>Ryan Randall</option>
                                <option value="Phil Glover" {{ $department->head == 'Phil Glover' ? 'selected' : '' }}>Phil Glover</option>
                                <option value="Victor Rampling" {{ $department->head == 'Victor Rampling' ? 'selected' : '' }}>Victor Rampling</option>
                                <option value="Sally Graham" {{ $department->head == 'Sally Graham' ? 'selected' : '' }}>Sally Graham</option>
                            </select>
                        </div>

                        <div class="col-sm-6">
                            <label class="form-label">Employees Under Work</label>
                            <input type="number" name="employees_under_work" class="form-control" value="{{ $department->employees_under_work }}">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
