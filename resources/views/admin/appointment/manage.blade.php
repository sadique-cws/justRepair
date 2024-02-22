@extends('admin.adminBase')

@section('title')
    Manage Services |
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Appointments</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Appointments</li>
                        <li class="breadcrumb-item active">Manage</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Services</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 450px;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default filter-btn" data-filter="today">Today</button>
                                        <button type="button" class="btn btn-default filter-btn" data-filter="this_week">This Week</button>
                                        <button type="button" class="btn btn-default filter-btn" data-filter="this_month">This Month</button>
                                    </div>
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Preferred Date</th>
                                        <th>Preferred Time</th>
                                        <th>Requirements</th>
                                        <th>Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">
                                    <!-- Table rows will be dynamically added here -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // AJAX call to fetch data
            $.ajax({
                url: "{{ route('appointment.index') }}", // Update with your controller's URL
                type: 'GET',
                success: function(response) {
                    // Update the table with the response data
                    if (response && response.length > 0) {
                        var tableRows = '';
                        response.forEach(function(row) {

                            var requirements = JSON.parse(row.requirements);

                            var requirementsHtml = '';

                            // Create a badge for each requirement
                            $.each(requirements, function(i, requirement) {
                                requirementsHtml +=
                                    `<span class="badge bg-success">${requirement}</span> `;
                            });
                            tableRows += `<tr> 
                        <td>${row.complain_no}</td>
                        <td>${row.fullname}</td>
                        <td>${row.preferred_date}</td>
                        <td>${row.preferred_time}</td>
                        <td>${requirementsHtml}</td>
                        <td>${row.mobileno}</td>
                        <td> <a href='/admin/appointment/view/${row.id}'class='btn btn-warning'>View</a> </td>
                        </tr>`;
                        });
                        $('#tableBody').html(tableRows);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    </script>
@endsection
