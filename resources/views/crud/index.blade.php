<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f7fb;
        }

        .page-title{
            font-weight:bold;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 4px 12px rgba(0,0,0,.08);
        }

        .table th{
            white-space:nowrap;
        }

        .action-btns a{
            margin:2px;
        }

        @media(max-width:768px){

            .header{
                flex-direction:column;
                gap:15px;
                text-align:center;
            }

            .page-title{
                font-size:28px;
            }

        }

    </style>

</head>
<body>

<div class="container py-4">

    <!-- Header -->

    <div class="header d-flex justify-content-between align-items-center mb-4">

        <h2 class="page-title">Laravel CRUD</h2>

        <a href="/logout" class="btn btn-danger">
            Logout
        </a>

    </div>

    <!-- Search -->

    <form method="GET" class="mb-4">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search Employee Name..."
            value="{{ request('search') }}">

    </form>

    <div class="row g-4">

        <!-- Left -->

        <div class="col-lg-4">

            <div class="card">

                <div class="card-body">

                    <h4 class="mb-3">
                        {{ isset($emp) ? 'Edit Employee' : 'Add Employee' }}
                    </h4>

                    <form method="POST"
                          action="{{ isset($emp) ? url('/update/'.$emp->id) : url('/store') }}">

                        @csrf

                        <input
                            type="text"
                            name="name"
                            class="form-control mb-3"
                            placeholder="Name"
                            value="{{ $emp->name ?? '' }}"
                            required>

                        <input
                            type="email"
                            name="email"
                            class="form-control mb-3"
                            placeholder="Email"
                            value="{{ $emp->email ?? '' }}"
                            required>

                        <input
                            type="text"
                            name="phone"
                            class="form-control mb-3"
                            placeholder="Phone"
                            value="{{ $emp->phone ?? '' }}"
                            required>

                        <input
                            type="date"
                            name="date"
                            class="form-control mb-3"
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

            </div>

        </div>

        <!-- Right -->

        <div class="col-lg-8">

            <div class="card">

                <div class="card-body">

                    <h4 class="mb-3">
                        Employee List
                    </h4>

                    <div class="table-responsive">

                        <table class="table table-bordered table-hover align-middle">

                            <thead class="table-dark">

                            <tr>

<th>
    Name
    <a href="?search={{ request('search') }}&sort=asc"
       class="text-white text-decoration-none">
        ▲
    </a>

    <a href="?search={{ request('search') }}&sort=desc"
       class="text-white text-decoration-none">
        ▼
    </a>
</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                                <th width="170">Action</th>

                            </tr>

                            </thead>

                            <tbody>

                            @forelse($emps as $e)

                            <tr>

                                <td>{{ $e->name }}</td>

                                <td>{{ $e->email }}</td>

                                <td>{{ $e->phone }}</td>

                                <td>{{ $e->date }}</td>

                                <td class="action-btns">

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
                                    No Data Found
                                </td>

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

</body>
</html>