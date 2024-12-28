@extends('admin.adminBase')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0 bg-black">
                            <h3 class="card-title">Total Users</h3>
                            <div class="card-tools">
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-download"></i>
                                </a>
                                <a href="#" class="btn btn-tool btn-sm">
                                    <i class="fas fa-bars"></i>
                                </a>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-sm text-sm table-striped table-valign-middle">
                                <thead>
                                    <tr class="table-light">
                                        <th class="py-2 px-3 text-start">Name</th>
                                        <th class="py-2 px-3 text-start">Email</th>
                                        <th class="py-2 px-3 text-start">Mobile No</th>
                                        <th class="py-2 px-3 text-start">Date of join</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <tr>
                                        <td colspan="3" class="text-center">Loading...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // AJAX call to fetch user data
            $.ajax({
                url: '{{ route('admin.api.users') }}', 
                type: 'GET',
                success: function(response) {
                    // Assuming your table body has an id of 'tableBody'
                    var tableBody = $('#tableBody');

                    // Clear existing table data
                    tableBody.empty();

                    // Check if there are users
                    if (response.length > 0) {
                        // Iterate over the JSON data
                        $.each(response, function(index, user) {
                            var tableRow = `
                                <tr>
                                    <td class="py-2 px-3">${user.name}</td>
                                    <td class="py-2 px-3">${user.email}</td>
                                    <td class="py-2 px-3">${user.mobile_no}</td>
                                    <td class="py-2 px-3">
                                    ${new Intl.DateTimeFormat('en-GB', { day: '2-digit', month: '2-digit', year: 'numeric' }).format(new Date(user.created_at))}
                                    </td>
                                </tr>`;
                            tableBody.append(tableRow);
                        });
                    } else {
                        tableBody.append(`<tr>
                            <td colspan="3" class="text-center">No users found.</td>
                        </tr>`);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    $('#tableBody').html(`<tr>
                        <td colspan="3" class="text-center">Error fetching data.</td>
                    </tr>`);
                }
            });
        });
    </script>
@endsection
