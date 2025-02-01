@extends('admin.adminBase')

@section('title')
    Manage Banner |
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Manage Banner</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item">Banner</li>
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
                            <h3 class="card-title">All Banners</h3>

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
            // AJAX call to fetch the banner
            let callingBanners = () => {
                $.ajax({
                    url: "{{ route('banner.index') }}",
                    type: 'GET',
                    success: function(response) {
                        // Update the table with the response data
                        if (response && response.length > 0) {
                            var tableRows = '';
                            response.forEach(function(row, index) {
                                // Start a new row for every two images
                                if (index % 2 === 0) {
                                    tableRows += '<tr>';
                                }

                                // Add the current image with footer buttons to the row
                                tableRows +=
                                    `<td style="text-align: center; padding: 10px;">
                                    <div style="border: 1px solid #ccc; padding: 10px;">
                                        <img src='/banners/${row.image}' width='500px' style="display: block; margin: auto;"/>
                                        <div style="margin-top: 10px;">
                                            <button type='submit' class='btn btn-danger deleteBtn' banner-id=${row.id}>Delete</button>
                                        </div>
                                    </div>
                                </td>`;



                                // Close the row after two images
                                if (index % 2 === 1 || index === response.length - 1) {
                                    tableRows += '</tr>';
                                }
                            });

                            // delete work for banner goes here:


                            $('#tableBody').html(tableRows);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
            callingBanners();

            $(document).on("click",".deleteBtn",function() {
                let id = $(this).attr("banner-id");
                $.ajax({
                    type: 'DELETE',
                    url: `/api/admin/banner/${id}`,
                    success: function(response) {
                        alert(response.message);

                        // to refresh the page:
                        callingBanners();
                    },
                });
            });
        });
    </script>
@endsection
