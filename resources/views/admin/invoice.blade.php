<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>
<body>
    <h1>Invoice</h1>
    <div class="card">
        <div class="card-body" id="calling_invoice">

        </div>
    </div>

<script>
    $(document).ready(function() {
        let callingData = () => {
            $.ajax({
                type: "GET",
                url: {{route('admin.appointment.generate')}},
                data: $('#calling_invoice').serialize(),
                success: function(response) {
                    let li = $("#calling_invoice");
                    li.empty();

                    let liList = response.data;

                    liList.forEach((item) => {
                        li.append(`
                                <p>Invoice Number: </p>
                                <p>Date:</p>
                                <p>Amount:</p>
                            `);
                    });
                }
            });
        };

        callingData();
    });
</script>



</body>
</html>


