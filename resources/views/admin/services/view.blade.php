@extends('admin.adminBase')

@section('title')
    Manage Services |
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 viewtitle">View Services</h1>
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
                            <h3 class="card-title viewtitle">All Services</h3>

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
                                <tbody id="tableBody">
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
        url: '{{route('service.show', 1)}}', // Update with your controller's URL
        type: 'GET',
        success: function(response) {
            // Update the table with the response data
            if (response) {
                    $(".viewtitle").html(response.name + " Service View")
                    let tableRows = `
                        <tr> 
                            <th>Id</th>
                            <td>${response.id}</td>
                        </tr>
                        <tr> 
                            <th>Name</th>
                            <td>${response.name}</td>
                        </tr>
                        <tr>
                            <th>Icon</th>
                            <td><img src='/uploads/${response.icon}' width='50px'/></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>${response.description}</td>
                        </tr>
                            <tr>
                                <td> 
                    <a href='/admin/service/view/${response.id}'class='btn btn-warning'>View</a> 
                    <a href='/admin/service/view/${response.id}'class='btn btn-danger'>Delete</a> 
                                </td>
                        </tr>`;
                $('#tableBody').html(tableRows);
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });

    // AJAX call to delete item
    $(document).on('click', '.deleteBtn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: '/your-delete-url/' + id, // Update with your delete route
            type: 'DELETE',
            success: function(response) {
                // Handle success response, maybe refresh the table or show a message
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // AJAX call to edit item
    $(document).on('click', '.editBtn', function() {
        var id = $(this).data('id');
        // Implement edit functionality as needed
    });
});

    </script>
@endsection
