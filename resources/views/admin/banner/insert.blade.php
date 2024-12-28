@extends('admin.adminBase')


@section('title', 'Insert Banner | ')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Insert Banner</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item "><a href="">Banner</a></li>
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
                            <h3 class="card-title">Insert Banner</h3>
                        </div>
                        <form id="submitForm" enctype="multipart/form-data">
                            <div class="card-body">
                                <d  iv class="form-group">
                                    <label for="exampleInputFile">Banner Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile"
                                                name="image">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>                                       
                                    </div>
                                </d>
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

            $('#submitForm').submit(function(e) {
                e.preventDefault();

                var formData = new FormData(this);

                $.ajax({
                    url: "{{ route('banner.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#message').html(
                                '<div class="alert alert-success">Banner image uploaded successfully</div>'
                                );
                            // Clear the form after successful submission
                            $('#submitForm')[0].reset();
                            
                            alert('Banner created successfully!');
                        } else {
                            $('#message').html(
                                '<div class="alert alert-danger">Failed to upload banner</div>'
                                );

                            alert('Failed to create banner!');
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
