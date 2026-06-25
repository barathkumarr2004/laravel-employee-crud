<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Laravel CRUD</h2>

        <a href="/logout" class="btn btn-danger">
            Logout
        </a>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="mb-4">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Search name"
               value="{{ request('search') }}">
    </form>

    <div class="row">

        <!-- LEFT : FORM -->
        <div class="col-md-4">

            <h5>{{ isset($emp) ? 'Edit Employee' : 'Add Employee' }}</h5>

            <form method="POST"
                  action="{{ isset($emp) ? url('/update/'.$emp->id) : url('/store') }}">

                @csrf

                <input type="text"
                       name="name"
                       class="form-control mb-2"
                       placeholder="Name"
                       value="{{ $emp->name ?? '' }}"
                       required>

                <input type="email"
                       name="email"
                       class="form-control mb-2"
                       placeholder="Email"
                       value="{{ $emp->email ?? '' }}"
                       required>

                <input type="text"
                       name="phone"
                       class="form-control mb-2"
                       placeholder="Phone"
                       value="{{ $emp->phone ?? '' }}"
                       required>

                <input type="date"
                       name="date"
                       class="form-control mb-2"
                       value="{{ $emp->date ?? '' }}"
                       required>

                <button class="btn btn-primary w-100">
                    {{ isset($emp) ? 'Update' : 'Save' }}
                </button>

                @if(isset($emp))
                    <a href="/" class="btn btn-secondary w-100 mt-2">
                        Cancel
                    </a>
                @endif

            </form>

        </div>

        <!-- RIGHT : TABLE -->
        <div class="col-md-8">

            <h5>Employee List</h5>

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>

                </thead>

                <tbody>

                @forelse($emps as $e)

                <tr>

                    <td>{{ $e->name }}</td>

                    <td>{{ $e->email }}</td>

                    <td>{{ $e->phone }}</td>

                    <td>{{ $e->date }}</td>

                    <td>

                        <a href="/edit/{{ $e->id }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a href="/delete/{{ $e->id }}"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Delete pannava?')">
                            Delete
                        </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center">
                        No data found
                    </td>

                </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>