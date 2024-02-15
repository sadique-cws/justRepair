@extends('admin.adminBase')

@section('title')
    Manage Services |
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Services</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Services</li>
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
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

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
                                        <th>Icon Image</th>
                                        <th>Description</th>
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
        url: "{{route('service.index')}}", // Update with your controller's URL
        type: 'GET',
        success: function(response) {
            // Update the table with the response data
            console.log(response)
            if (response && response.length > 0) {
                var tableRows = '';
                response.forEach(function(row) {
                    tableRows += '<tr>' +
                        '<td>' + row.id + '</td>' +
                        '<td>' + row.name + '</td>' +
                        '<td>' + row. + '</td>' +
                        '<td><span class="tag tag-' + row.status.toLowerCase() + '">' + row.status + '</span></td>' +
                        '<td>' + row.reason + '</td>' +
                        '</tr>';
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
