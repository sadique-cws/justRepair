@extends('admin.adminBase')


@section('title', 'Insert Service | ')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Insert Services</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="">Service</a></li>
                        <li class="breadcrumb-item active">Manage</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Insert Services</h3>
                        </div>
                        <form id="submitForm" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="serviceTitle">Service Name</label>
                                    <input type="text" class="form-control" name="name" id="serviceTitle" placeholder="Enter Service Name">
                                </div>
                        
                                <div class="form-group">
                                    <label for="exampleInputFile">Icon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="icon">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea rows="5" class="form-control" id="description" name="description" placeholder="Enter Description"></textarea>
                                </div>
                        
                                <!-- Dynamic Requirement Fields -->
                                <div class="form-group" id="requirementsGroup">
                                    <label for="requirements">Requirements:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="requirements[]" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary addRequirementBtn" type="button">Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        
                        <div id="message"></div>

                    </div>


                </div>



            </div>

        </div>
    </section>

@endsection


@section('js')
    <script>
        $(document).ready(function() {

            
        // Add requirement field dynamically
        $(document).on('click', '.addRequirementBtn', function() {
            var html = '<div class="input-group mb-3">' +
                '<input type="text" class="form-control" name="requirements[]" required>' +
                '<div class="input-group-append">' +
                '<button class="btn btn-outline-secondary removeRequirementBtn" type="button">Remove</button>' +
                '</div>' +
                '</div>';
            $('#requirementsGroup').append(html);
        });

        // Remove requirement field
        $(document).on('click', '.removeRequirementBtn', function() {
            $(this).closest('.input-group').remove();
        });
        
            $('#submitForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                // console.log('All Requirements:');
                // $('input[name="requirements[]"]').each(function(index) {
                //     console.log(index + 1 + '. ' + $(this).val());
                // });
                    $.ajax({
                    url: "{{route('service.store')}}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#message').html('<div class="alert alert-success">Service and requirements added successfully</div>');
                            // Clear the form after successful submission
                            $('#submitForm')[0].reset();
                            // Remove dynamically added requirement fields
                            $('#requirementsGroup').empty();
                            alert('Service created successfully!');
                        } else {
                            $('#message').html('<div class="alert alert-danger">Failed to add service and requirements</div>');

                            alert('Failed to create service!');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
