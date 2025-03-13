@extends('layouts.staradmin')
@section('title','Staff Members')
@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-sm-flex justify-content-between align-items-start">
                        <h2 class="card-title card-title-dash">Staff Members</h2>

                        <!-- Button to trigger modal -->
                        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#staffModal" onclick="resetForm()">Add Staff</button>
                    </div>
                    <!-- Staff Members Table -->
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Services</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($staffMembers as $staff)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $staff->name }}</td>
                                    <td>{{ $staff->email }}</td>
                                    <td>{{ $staff->role }}</td>
                                    <td>
                                        @foreach($staff->services as $service)
                                        <span class="badge bg-info">{{ $service->name }}</span>
                                        @endforeach
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" onclick="editStaff({{ $staff }})" data-bs-toggle="modal" data-bs-target="#staffModal">Edit</button>

                                        <!-- Manage Services Button -->
                                        <button class="btn btn-secondary btn-sm" onclick="manageServices({{ $staff }})" data-bs-toggle="modal" data-bs-target="#servicesModal">Manage Services</button>

                                        <form action="{{ route('staff-members.destroy', $staff->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit Staff Modal -->
<div class="modal fade" id="staffModal" tabindex="-1" aria-labelledby="staffModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staffModalLabel">Add Staff</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="staffForm" method="POST">
                    @csrf
                    <input type="hidden" id="staff_id" name="staff_id">
                    <input type="hidden" id="_method" name="_method" value="POST">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" required>
                        @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Manage Services Modal -->
<div class="modal fade" id="servicesModal" tabindex="-1" aria-labelledby="servicesModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="servicesModalLabel">Manage Services</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('staff-members.updateServices', ['id' => 'staff_services_id']) }}">
                    @csrf
                    <input type="hidden" id="staff_services_id" name="staff_id">

                    <div class="mb-3">
                        <label for="serviceSelect" class="form-label">Select Services</label>
                        <select class="form-select" id="serviceSelect" name="services[]" multiple required>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Services</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function resetForm() {
        // Reset form fields
        document.getElementById('staffForm').reset();
        document.getElementById('staff_id').value = '';
        document.getElementById('_method').value = 'POST'; // Reset to POST
        document.getElementById('staffModalLabel').textContent = "Add Staff";
        document.getElementById('staffForm').action = "{{ route('staff-members.store') }}";

        // Reset multi-select options
        let serviceSelect = document.getElementById('services');
        for (let option of serviceSelect.options) {
            option.selected = false;
        }
    }

    function editStaff(staff) {
        document.getElementById('staff_id').value = staff.id;
        document.getElementById('name').value = staff.name;
        document.getElementById('email').value = staff.email;
        document.getElementById('role').value = staff.role;

        // Select services for editing
        let serviceSelect = document.getElementById('services');
        for (let option of serviceSelect.options) {
            option.selected = staff.services.some(s => s.id == option.value);
        }

        // Update form action for PUT request
        document.getElementById('_method').value = 'PUT';
        document.getElementById('staffModalLabel').textContent = "Edit Staff";
        document.getElementById('staffForm').action = "{{ url('/staff-members') }}/" + staff.id;
    }

    // Manage Services for Staff
    function manageServices(staff) {
        document.getElementById('staff_services_id').value = staff.id;
        let serviceSelect = document.getElementById('serviceSelect');

        // Unselect all first
        for (let option of serviceSelect.options) {
            option.selected = false;
        }

        // Select existing services
        staff.services.forEach(service => {
            let option = serviceSelect.querySelector(`option[value="${service.id}"]`);
            if (option) option.selected = true;
        });

        document.getElementById('servicesModalLabel').textContent = "Manage Services for " + staff.name;
    }
</script>
@endsection