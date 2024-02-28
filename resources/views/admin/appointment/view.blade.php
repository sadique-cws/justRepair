@extends('admin.adminBase')

@section('title')
    Manage Services |
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">View Appointment</h1>
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
                                <tfoot id="tablefooter">

                                    <tr>
                                        <th colspan="2">Invoice Information</th>
                                    </tr>
                                    <tr>
                                        <th>
                                            <select name="" class="form-control" id="serviceFeeCalling"></select>
                                        </th>
                                        <th>
                                            <input type="number" class="form-control" id="serviceFeeAmount">
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card-tools mb-4">
                        <a href="{{ route('admin.invoice') }}" class="btn btn-sm btn-success">Proceed To Invoice</a>
                       
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
                $("#tablefooter").hide();
                // AJAX call to fetch data
                $.ajax({
                    url: '{{ route('appointment.show', request()->segment(4)) }}', // Update with your controller's URL
                    type: 'GET',
                    success: function(response) {
                        // Update the table with the response data
                        var service_id = response.services.id;
                        let date = new Date(response.created_at);
                        if (response) {
                            var requirements = JSON.parse(response.requirements);
                            var requirementsHtml = '';

                            // Create a badge for each requirement
                            $.each(requirements, function(i, requirement) {
                                requirementsHtml +=
                                    `<span class="badge bg-success">${requirement}</span> `;
                            });
                            $(".viewtitle").html(response.fullname + "'s Service View")
                            let tableRows = `
                        <tr> 
                            <th>Id</th>
                            <td>${response.id}</td>
                        </tr>
                        <tr> 
                            <th>Complain No</th>
                            <td><span class='bg-danger px-2 py-1 rounded'>${response.complain_no}</span></td>
                        </tr>
                        <tr> 
                            <th>Name</th>
                            <td>${response.fullname}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>${response.mobileno}</td>
                        </tr>
                        <tr>
                            <th>Service</th>
                            <td>${response.services.name}</td>
                        </tr>
                        <tr>
                            <th>Preferred Date & Time</th>
                            <td><span class='bg-warning px-2 py-1 rounded '>${response.preferred_date} (${response.preferred_time})</span></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>${response.address}, ${response.city}</td>
                        </tr>
                        <tr>
                            <th>Requirements</th>
                            <td>${requirementsHtml}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>${date.toLocaleString()}</td>
                        </tr>
                        <tr>
                        <th>Status</th>
                        <td>
                            <select class="form-control status-select" data-id="${response.id}">
                                <option value="accept" ${response.status === 'accept' ? 'selected' : ''}>Accept</option>
                                <option value="reject" ${response.status === 'reject' ? 'selected' : ''}>Reject</option>
                                <option value="process" ${response.status === 'process' ? 'selected' : ''}>Process</option>
                                <option value="done" ${response.status === 'done' ? 'selected' : ''}>Done</option>
                                <option value="close" ${response.status === 'close' ? 'selected' : ''}>Close</option>
                            </select>
                            <span class='error-msg text-success text-small'></span>
                        </td>
                    </tr>

                       `;
                            $('#tableBody').html(tableRows);
                        }


                        $('.status-select').change(function() {
                            var appointmentId = $(this).data('id');
                            var newStatus = $(this).val();
                            // Update status via AJAX
                            $.ajax({
                                url: '{{ route('appointment.updateStatus') }}',
                                type: 'POST',
                                data: {
                                    id: appointmentId,
                                    status: newStatus
                                },
                                success: function(response) {
                                    $(".error-msg").text(response.message)
                                    if (response.data.status === "done") {
                                        $("#tablefooter").show();

                                        $.ajax({
                                            url: '{{ route('servicefee.index') }}',
                                            type: 'GET',
                                            data: {
                                                service_id
                                            },
                                            dataType: 'json',
                                            success: function(response) {
                                                var select = $(
                                                    '#serviceFeeCalling'
                                                    );
                                                select.empty();
                                                $.each(response, function(
                                                    index, item) {
                                                    let sublist =
                                                        item
                                                        .sub_fees;
                                                    select.append($(
                                                            '<option>'
                                                            )
                                                        .text(
                                                            item
                                                            .service_fees_name
                                                            )
                                                        .attr(
                                                            'value',
                                                            item
                                                            .id)
                                                        .data(
                                                            'amount',
                                                            item
                                                            .service_fees
                                                            ) // Assuming 'service_fee_amount' is the key for fee amount
                                                    );
                                                    $.each(sublist,
                                                        function(
                                                            subindex,
                                                            subitem
                                                            ) {
                                                            select
                                                                .append(
                                                                    $(
                                                                        '<option>')
                                                                    .text(
                                                                        "--" +
                                                                        subitem
                                                                        .service_fees_name
                                                                        )
                                                                    .attr(
                                                                        'value',
                                                                        subitem
                                                                        .id
                                                                        )
                                                                    .data(
                                                                        'amount',
                                                                        subitem
                                                                        .service_fees
                                                                        ) // Assuming 'service_fee_amount' is the key for fee amount
                                                                );
                                                        })
                                                });

                                                // add amount 
                                                $("#serviceFeeCalling")
                                                    .change(function() {
                                                        var selectedOption =
                                                            $(this)
                                                            .children(
                                                                "option:selected"
                                                                );
                                                        var selectedAmount =
                                                            selectedOption
                                                            .data(
                                                                "amount"
                                                                );

                                                        $("#serviceFeeAmount")
                                                            .val(
                                                                selectedAmount
                                                                );
                                                    })

                                            },
                                            error: function(xhr, status,
                                                error) {
                                                console.error(error);
                                            }
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error(xhr.responseText);
                                }
                            });
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }

                });

            });
        </script>
    @endsection
