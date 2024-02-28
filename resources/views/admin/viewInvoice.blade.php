<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-8 mt-8 rounded shadow-md " id="invoiceContent">
        <div class="flex justify-between items-center mb-8 flex-col md:flex-row">
            <img src="{{ asset('images/logo.png') }}" alt="Company Logo" class="w-auto h-24">
            <div class="text-right">
                <!-- Company Address -->
                <p class="text-gray-700">Just Repair Group</p>
                <p class="text-gray-700">Naka Chowk, Purnea City, Purnea (Bihar) - 854301</p>
                <!-- Contact Information -->
                <p class="text-gray-700">Phone: 72-800-800-80</p>
                <p class="text-gray-700">Email: justrepair.info@gmail.com</p>
            </div>
        </div>
        <h1 class="text-2xl font-semibold mb-4"><span id="invoiceNumber">INV123</span></h1>
        <div class="grid grid-cols-2 gap-8">
            <div>
                <h2 class="text-lg font-semibold mb-2">Customer Information</h2>
                <p class="text-gray-700"><span class="font-semibold">Name:</span> <span id="customerName">John
                        Doe</span></p>
                <p class="text-gray-700"><span class="font-semibold">Email:</span> <span
                        id="customerEmail">john@example.com</span></p>
                <p class="text-gray-700"><span class="font-semibold">Address:</span> <span id="customerAddress">123 Main
                        St, City, Country</span></p>
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Invoice Details</h2>
                <p class="text-gray-700"><span class="font-semibold">Date:</span> <span id="invoiceDate">January 28,
                        2024</span></p>
                <p class="text-gray-700"><span class="font-semibold">Due Date:</span> February 28, 2024</p>
                <p class="text-gray-700"><span class="font-semibold">Amount:</span> ₹<span
                        id="invoiceAmount">500.00</span></p>
            </div>
        </div>
        <h2 class="text-lg font-semibold my-4">Items</h2>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 bg-gray-100 border border-gray-300">Item</th>
                    <th class="py-2 px-4 bg-gray-100 border border-gray-300">Quantity</th>
                    <th class="py-2 px-4 bg-gray-100 border border-gray-300">Price</th>
                    <th class="py-2 px-4 bg-gray-100 border border-gray-300">Total</th>
                </tr>
            </thead>
            <tbody id="invoiceItems">
                <!-- Invoice items will be populated here -->
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Subtotal</td>
                    <td class="py-2 px-4 border border-gray-300" id="subtotalAmount">₹500.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Tax</td>
                    <td class="py-2 px-4 border border-gray-300" id="taxAmount">₹50.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Total</td>
                    <td class="py-2 px-4 border border-gray-300" id="totalAmount">₹550.00</td>
                </tr>
            </tfoot>
        </table>

        <div class="flex justify-end mt-4">
            <button id="printButton"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">Print</button>
            <button id="downloadButton"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Download</button>
           


        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Your JavaScript code here
        $(document).ready(function() {
            

            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: '/api/invoice/{{ $invoiceId }}',
                    success: function(response) {
                        // Populate the invoice details
                        $('#invoiceNumber').text('Invoice Number: ' + response.id);
                        $('#invoiceDate').text('' + new Date(response.created_at)
                            .toLocaleString());
                        $('#invoiceAmount').text('₹' + response.total_amount.toFixed(2));

                        // Populate the customer information
                        $('#customerName').text(response.appointment.fullname);
                        $('#customerEmail').text(response.appointment.mobileno);
                        $('#customerAddress').text(response.appointment.address);

                        // Populate the invoice items
                        let itemsHtml = '';

                        itemsHtml += '<tr>';
                        itemsHtml += '<td class="py-2 px-4 border border-gray-300 capitalize">' +
                            response.service_fees.service_fees_name + '</td>';
                        itemsHtml += '<td class="py-2 px-4 border border-gray-300">1</td>';
                        itemsHtml += '<td class="py-2 px-4 border border-gray-300">₹' + response
                            .service_fees.service_fees.toFixed(2) + '</td>';
                        itemsHtml += '<td class="py-2 px-4 border border-gray-300">₹' + response
                            .total_amount.toFixed(2) + '</td>';
                        itemsHtml += '</tr>';

                        $('#invoiceItems').html(itemsHtml);

                        // Populate the total amounts
                        $('#subtotalAmount').text('₹' + response.total_amount.toFixed(2));
                        let taxAmount = response.total_amount * 0.0; // Assuming tax is 10%
                        $('#taxAmount').text('₹' + taxAmount.toFixed(2));
                        let totalAmount = response.total_amount + taxAmount;
                        $('#totalAmount').text('₹' + totalAmount.toFixed(2));


                        // Print button
                        $('#printButton').on('click', function() {
                            
                            window.print();
                        });

                        // Download PDF button
                        $('#downloadButton').on('click', function() {
                        let invoiceContent = $('#invoiceContent').html(); // Get the HTML content of the invoice
                            console.log(invoiceContent)
                $.ajax({
                    type: "POST",
                    url: '/api/invoice/download',
                    data: {
                        invoiceContent: invoiceContent
                    },
                    success: function(response) {
                        // Redirect to the PDF download link
                        // alert(response.data)
                        window.location.href = response.downloadUrl;
                    }
                });
            });

                    }
                });


            };

            callingData();
        });
    </script>
</body>

</html>
