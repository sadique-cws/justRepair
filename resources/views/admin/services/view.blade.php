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
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title viewtitle">All Services</h3>

                                    <div class="card-tools">
                                        <a href="{{ route('admin.service.manage') }}" class="btn btn-sm btn-primary">Go
                                            Back</a>
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
                        </div>
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="align-items-center text-primary">Manage Requirements</h6>
                                </div>
                                <div class="card-body">
                                    {{-- flash message section starts here --}}
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    {{-- flash message section ends here --}}
                                    <form action="{{ route('requirements.store') }}" method="POST"
                                        class="d-flex align-items-center mb-3">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        {{-- {{ dd($service->id) }} --}}
                                        <input type="text" name="req_name" placeholder="Add new requirement" required
                                            class="form-control">
                                        <button type="submit" class="btn btn-primary ml-2">Add</button>
                                    </form>
                                    <div>
                                        @foreach ($service->requirements as $req)
                                            <div
                                                class="d-flex justify-content-between align-items-center mb-1 p-2 border rounded ">
                                                {{ $req->req_name }}
                                                <div>
                                                    {{-- edit button goes here --}}
                                                    <button class="btn btn-sm btn-primary ml-2 edit-btn"
                                                        data-id="{{ $req->id }}" data-toggle="modal"
                                                        data-target="#editRequirementModal_{{ $req->id }}">Edit
                                                    </button>

                                                    {{-- delete button goes here --}}
                                                    <button class="btn btn-sm btn-danger ml-2 delete-btn"
                                                        data-id="{{ $req->id }}" data-toggle="modal"
                                                        data-target="#deleteRequirementModal_{{ $req->id }}">Delete
                                                    </button>
                                                </div>

                                                <!-- Delete requirements modal starts here -->
                                                <div class="modal fade" id="deleteRequirementModal_{{ $req->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="deleteRequirementModalLabel_{{ $req->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="deleteRequirementModalLabel_{{ $req->id }}">
                                                                    Delete Requirement
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are you sure you want to delete this requirement?</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form
                                                                    action="{{ route('requirements.destroy', $req->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Delete</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Delete requirements modal ends here -->

                                                {{-- edit requirements modal starts here --}}
                                                <div class="modal fade" id="editRequirementModal_{{ $req->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="editRequirementModalLabel_{{ $req->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="editRequirementModalLabel_{{ $req->id }}">
                                                                    Edit
                                                                    Requirement</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form id="editRequirementForm_{{ $req->id }}"
                                                                    action="{{ route('requirements.update', $req->id) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="id"
                                                                        value="{{ $req->id }}">
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="editReqName_{{ $req->id }}">Requirement
                                                                            Name</label>
                                                                        <input type="text" class="form-control"
                                                                            id="editReqName_{{ $req->id }}"
                                                                            name="req_name" value="{{ $req->req_name }}"
                                                                            required>
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- edit requirements modal ends here --}}
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

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

                        <div class="modal fade" id="editServiceModal" tabindex="-1" role="dialog"
                            aria-labelledby="editServiceModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" id="editServiceForm">

                                            <input type="hidden" id="editServiceSlug" name="slug">
                                            <div class="form-group">
                                                <label for="editServiceName">Name</label>
                                                <input type="text" class="form-control" id="editServiceName"
                                                    name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="editServiceDescription">Description</label>
                                                <textarea class="form-control" id="editServiceDescription" name="description" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="editServiceIcon">Icon</label>
                                                <img src='/uploads/{{ $service->icon }}' width='50px'
                                                    class="mt-2" />
                                                <input type="file" class="form-control" id="editServiceIcon"
                                                    name="icon">
                                                <small class="form-text text-muted">Leave empty to keep the current
                                                    icon.</small>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                let service_id = @json($service->id);

                // service fee calling here
                const CallingServiceFees = () => {
                    $.ajax({
                        url: '{{ route('servicefee.index') }}',
                        type: 'GET',
                        dataType: 'json',
                        data: {
                            "service_id": service_id
                        },
                        success: function(response) {
                            $('#accordionExample').empty();
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
                                            <li class="list-group-item d-flex justify-content-between">
                                                <span>${subFee.service_fees_name}:</span>
                                                <span>
                                                    <span>₹${subFee.service_fees}</span>
                                                    <button class="btn btn-sm btn-primary ml-2 edit-btn" data-id="${subFee.id}" data-toggle="modal" data-target="#editServiceFeeModal_${subFee.id}">Edit</button>
                                                </span>

                                                <!-- Edit Modal -->
                                                <div class="modal fade" id="editServiceFeeModal_${subFee.id}" tabindex="-1" role="dialog" aria-labelledby="editServiceFeeModalLabel_${subFee.id}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editServiceFeeModalLabel_${subFee.id}">Edit Service Fee</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{ request()->segment(4) }}/servicefee/${subFee.id}/update">
                                                                    @csrf
                                                                    @method('put')
                                                                    <input type="hidden" id="editServiceFeeId_${subFee.id}" name="id" value="${subFee.id}">
                                                                    <div class="form-group">
                                                                        <label for="editServiceFeeName_${subFee.id}">Service Fee Name</label>
                                                                        <input type="text" class="form-control" id="editServiceFeeName_${subFee.id}" name="service_fees_name" value="${subFee.service_fees_name}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editServiceFeeAmount_${subFee.id}">Amount</label>
                                                                        <input type="text" class="form-control" id="editServiceFeeAmount_${subFee.id}" name="service_fees" value="${subFee.service_fees}" required>
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>    
                                            </li>
                                            `;
                                });
                                accordionItem += `
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                `;
                                $('#accordionExample').append(accordionItem);

                                // **Moving the edit logic inside the loop to ensure subFee.id is accessible**


                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
                CallingServiceFees();



                // insertion of service fee here
                $('#createServiceFeeForm').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('servicefee.store') }}',
                        data: $(this).serialize(),
                        success: function(response) {
                            console.log(response);
                            alert('Service Fee created successfully.');
                            CallingServiceFees();
                            // Optionally, you can redirect the user to another page after successful creation
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            alert('An error occurred. Please try again.');
                        }
                    });
                });

                // AJAX call to fetch data alongwith the edition work goes here:
                $.ajax({
                    url: '{{ route('service.show', request()->segment(4)) }}', // Update with your controller's URL
                    type: 'GET',
                    success: function(response) {
                        // Update the table with the response data
                        $("#service_id").val(response.id)

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
                                            <button class="btn btn-danger btn-sm mr-4 deleteBtn" data-id="${response.id}">Delete</button> 
                                            <button class="btn btn-primary btn-sm editBtn" data-id="${response.slug}">Edit</button>
                                            {{-- model for service-edit work goes here --}}
                                        </td>
                                </tr>`;
                            $('#tableBody').html(tableRows);
                        }

                        $(document).on('click', '.editBtn', function() {
                            const id = $(this).data('id'); // Get the service ID
                            const url = `/api/admin/service/${id}`; // Construct the API URL

                            // Fetch the service data via AJAX
                            $.ajax({
                                url: url,
                                type: 'GET',
                                success: function(response) {
                                    // Debug the requirements structure
                                    // console.log(response.requirements);

                                    // Populate the modal fields with the response data
                                    $('#editServiceSlug').val(response.slug);
                                    $('#editServiceName').val(response.name);
                                    $('#editServiceDescription').val(response
                                        .description);

                                    if (Array.isArray(response.requirements)) {
                                        let requirementsHTML =
                                            ''; // To hold the dynamically created input fields

                                        response.requirements.forEach(function(item,
                                            index) {
                                            requirementsHTML += `
                                                <div class="requirement-item">
                                                    <label for="requirement-${index}">Requirement ${index + 1}</label>
                                                    <input type="text" class="form-control" id="requirement-${index}" name="requirements[${index}][req_name]" value="${item.req_name}" data-id="${item.id}">
                                                </div>`;
                                        });

                                        $('#editServiceRequirementsContainer').html(
                                            requirementsHTML);
                                        console.log(response
                                            .requirements); // Log for debugging
                                    } else {
                                        console.error('Invalid requirements data.');
                                        $('#editServiceRequirementsContainer').html(
                                            ''); // Clear the field if invalid
                                    }

                                    // Open the modal
                                    $('#editServiceModal').modal('show');
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                    alert('Failed to fetch service details.');
                                }
                            });

                        });

                        //edit work goes here

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });

                // // here goes the services and the required fee:
                // $.ajax({
                //     url: '{{ route('servicefee.index') }}',
                //     type: 'GET',
                //     dataType: 'json',
                //     data: {
                //         "service_id": service_id
                //     },
                //     success: function(response) {
                //         // Populate the selected dropdown with service fees
                //         var select = $('#parent_id');
                //         select.empty();
                //         select.append($('<option>').text('Main Category').attr('value', ""));
                //         $.each(response, function(index, item) {
                //             select.append($('<option>').text(item.service_fees_name).attr('value',
                //                 item.id));
                //         });
                //     },
                //     error: function(xhr, status, error) {
                //         console.error(error);
                //     }
                // });




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

            });
        </script>
        <script>
            $('#editServiceForm').submit(function(e) {
                e.preventDefault();

                let ServiceSlug = $('#editServiceSlug').val();

                // Gather form data
                let formData = {
                    name: $('#editServiceName').val(),
                    description: $('#editServiceDescription').val(),
                };

                // Check if a file is selected
                let fileInput = document.getElementById('editServiceIcon');
                if (fileInput.files && fileInput.files[0]) {
                    let file = fileInput.files[0];
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        // Add the Base64 file content to formData
                        formData.icon = event.target.result;

                        // Send the AJAX request
                        sendRequest(ServiceSlug, formData);
                    };
                    reader.readAsDataURL(file); // Convert file to Base64
                } else {
                    // If no file is selected, send the request without the icon
                    sendRequest(ServiceSlug, formData);
                }
            });

            function sendRequest(ServiceSlug, formData) {
                $.ajax({
                    type: 'PUT',
                    url: `/api/admin/service/${ServiceSlug}`,
                    data: JSON.stringify(formData),
                    contentType: 'application/json', // Send data as JSON
                    success: function(response) {
                        alert('Service updated successfully.');
                        $('#editServiceModal').modal('hide'); // Close the modal
                        location.href = "/admin/service/"; // Reload the page to reflect changes
                    },
                    error: function(xhr) {
                        alert('Failed to update service. Please try again.');
                    },
                });
            }
        </script>
    @endsection
