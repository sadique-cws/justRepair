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
                                <a href="{{ route('admin.service.manage') }}" class="btn btn-sm btn-primary">Go Back</a>
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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Services Fees</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h2 class="card-title">Insert Here</h2>
                                        </div>
                                        <div class="card-body">
                                            <form id="createServiceFeeForm">
                                                @csrf
                                                <div class="mb-3">

                                                    <label for="service_id">Service ID:</label>
                                                    <input type="text" class="form-control" id="service_id"
                                                        name="service_id" required>
                                                </div>
                                                <div class="mb-3">

                                                    <label for="service_fees_name">Service Fees Name:</label>
                                                    <input type="text" class="form-control" id="service_fees_name"
                                                        name="service_fees_name" required>
                                                </div>
                                                <div class="mb-3">

                                                    <label for="service_fees">Service Fees:</label>
                                                    <input type="text" class="form-control" id="service_fees"
                                                        name="service_fees" required>
                                                </div>
                                                <div class="mb-3">

                                                    <label for="parent_id">Parent ID:</label>
                                                    <select type="text" class="form-control" id="parent_id"
                                                        name="parent_id">

                                                    </select>
                                                </div>

                                                <button type="submit">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="accordion" id="accordionExample">

                                    </div>
                                </div>
                            </div>
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
                $.ajax({
                    url: '{{route('servicefee.index')}}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                        response.forEach(function(item) {
                            var accordionItem = `
                <div class="card">
                    <div class="card-header" id="heading${item.id}">
                        <h2 class="mb-0">
                            <button class="btn btn-link text-capitalize btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse${item.id}" aria-expanded="true" aria-controls="collapse${item.id}">
                                ${item.service_fees_name}
                            </button>
                        </h2>
                    </div>
                    <div id="collapse${item.id}" class="collapse" aria-labelledby="heading${item.id}" data-parent="#accordionExample">
                        <div class="card-body">
                            <ul class="list-group">
                            `;
                            item.sub_fees.forEach(function(subFee) {
                                accordionItem += `
                    <li class="list-group-item d-flex justify-content-between"><span>${subFee.service_fees_name}:</span> <span>${subFee.service_fees}</span></li>
                    `;
                            });
                            accordionItem += `
                            </ul>
                        </div>
                    </div>
                </div>
                `;
                            $('#accordionExample').append(accordionItem);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
                // insertion
                $('#createServiceFeeForm').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('servicefee.store') }}',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response);
                            alert('Service Fee created successfully.');
                            // Optionally, you can redirect the user to another page after successful creation
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred. Please try again.');
                        }
                    });
                });
                // AJAX call to fetch data
                $.ajax({
                    url: '{{ route('service.show', request()->segment(4)) }}', // Update with your controller's URL
                    type: 'GET',
                    success: function(response) {
                        // Update the table with the response data
                        $("#service_id").val(response.id)

                        if (response) {
                            var reqNames = response.requirements.map(function(item) {
                                return item.req_name;
                            }).join(', ');
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
                            <th>Requirements</th>
                            <td>${reqNames}</td>
                        </tr>
                       
                            <tr>
                                <td> 
                                    <button class="btn btn-danger btn-sm deleteBtn" data-id="${response.id}">Delete</button> 
                                    <button class="btn btn-primary btn-sm editBtn" data-id="${response.id}">Edit</button>
                                </td>
                        </tr>`;
                            $('#tableBody').html(tableRows);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                $.ajax({
                    url: '{{ route('servicefee.index') }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Populate the select dropdown with service fees
                        var select = $('#parent_id');
                        select.empty();
                        select.append($('<option>').text('Main Category').attr('value', ""));
                        $.each(response, function(index, item) {
                            select.append($('<option>').text(item.service_fees_name).attr('value',
                                item.id));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });

                // AJAX call to delete item
                $(document).on('click', '.deleteBtn', function() {
                    var id = $(this).data('id');
                    $.ajax({
                        url: '/api/admin/service/' + id,
                        type: 'DELETE',
                        success: function(response) {
                            window.location.href = "{{ route('admin.service.manage') }}"
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // AJAX call to edit item
                $(document).on('click', '.editBtn', function() {
                    var id = $(this).data('id');
                });
            });
        </script>
    @endsection
