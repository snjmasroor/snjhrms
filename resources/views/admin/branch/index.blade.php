@extends('includes.masters')
@push('styles')
      <link rel="stylesheet" href="{{asset('assets/plugin/datatables/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugin/datatables/dataTables.bootstrap5.min.css')}}">
@endpush
@section('content')
      <div class="body d-flex py-lg-3 py-md-2">
            <div class="container-xxl">
                <div class="row align-items-center">
                    <div class="border-0 mb-4">
                        <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                            <h3 class="fw-bold mb-0">Branch</h3>
                            <div class="col-auto d-flex w-sm-100">
                                <button type="button" class="btn btn-dark btn-set-task w-sm-100" data-bs-toggle="modal" data-bs-target="#depadd"><i class="icofont-plus-circle me-2 fs-6"></i>Add Branch</button>
                            </div>
                        </div>
                    </div>
                </div> 
              <!-- Branch List -->
<div class="row clearfix g-3">
  <div class="col-sm-12">
    <div class="card mb-3">
      <div class="card-body">
        <table id="branchTable" class="table table-hover align-middle mb-0" style="width:100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Branch Name</th>
              <th>Location</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @forelse($branches as $index => $branch)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $branch->name }}</td>
              <td>{{ $branch->location ?? '-' }}</td>
              <td>
                @if($branch->active)
                  <span class="badge bg-success">Active</span>
                @else
                  <span class="badge bg-danger">Inactive</span>
                @endif
              </td>
              <td>
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#branchedit{{ $branch->id }}">
                    <i class="icofont-edit text-success"></i>
                  </button>
                  <form action="{{ route('admin.branch.destroy', $branch->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-secondary">
                      <i class="icofont-ui-delete text-danger"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>

            {{-- Include edit modal --}}
            @include('admin.branch.edit', ['branch' => $branch])
            @empty
            <tr>
              <td colspan="5" class="text-center">No branches found.</td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

            </div>
      </div>
        
      

        <!-- Add Department-->
        <div class="modal fade" id="depadd" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="{{ route('admin.branch.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title fw-bold" id="depaddLabel">Add Branch</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="departmentName" class="form-label">Branch Name</label>
                                <input type="text" class="form-control" id="departmentName" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="departmentName" class="form-label">Location</label>
                                <input type="text" class="form-control" id="departmentName" name="location" required>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Done</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        @endsection
        @push('scripts')
        <script src="{{asset('assets/bundles/dataTables.bundle.js')}}"></script>


<script>
    // project data table
    $(document).ready(function() {
        $('#myProjectTable')
        .addClass( 'nowrap' )
        .dataTable( {
            responsive: true,
            columnDefs: [
                { targets: [-1, -3], className: 'dt-body-right' }
            ]
        });
        $('.deleterow').on('click',function(){
        var tablename = $(this).closest('table').DataTable();  
        tablename
                .row( $(this)
                .parents('tr') )
                .remove()
                .draw();

        } );
    });
</script>
        @endpush