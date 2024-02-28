<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="max-w-4xl mx-auto bg-white p-8 mt-8 rounded shadow-md">
        <h1 class="text-2xl font-semibold mb-4">Invoice #INV123</h1>
        <div class="grid grid-cols-2 gap-8">
            <div id="">
                {{-- <h2 class="text-lg font-semibold mb-2">Customer Information</h2>
                <p class="text-gray-700"><span class="font-semibold">Name:</span> John Doe</p>
                <p class="text-gray-700"><span class="font-semibold">Email:</span> john@example.com</p>
                <p class="text-gray-700"><span class="font-semibold">Address:</span> 123 Main St, City, Country</p> --}}
            </div>
            <div>
                <h2 class="text-lg font-semibold mb-2">Invoice Details</h2>
                <p class="text-gray-700"><span class="font-semibold">Date:</span> January 28, 2024</p>
                <p class="text-gray-700"><span class="font-semibold">Due Date:</span> February 28, 2024</p>
                <p class="text-gray-700"><span class="font-semibold">Amount:</span> $500.00</p>
                <!-- Add more invoice details as needed -->
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
            <tbody>
                <tr>
                    <td class="py-2 px-4 border border-gray-300">Item 1</td>
                    <td class="py-2 px-4 border border-gray-300">2</td>
                    <td class="py-2 px-4 border border-gray-300">$100.00</td>
                    <td class="py-2 px-4 border border-gray-300">$200.00</td>
                </tr>
                <tr>
                    <td class="py-2 px-4 border border-gray-300">Item 2</td>
                    <td class="py-2 px-4 border border-gray-300">1</td>
                    <td class="py-2 px-4 border border-gray-300">$300.00</td>
                    <td class="py-2 px-4 border border-gray-300">$300.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Subtotal</td>
                    <td class="py-2 px-4 border border-gray-300">$500.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Tax</td>
                    <td class="py-2 px-4 border border-gray-300">$50.00</td>
                </tr>
                <tr>
                    <td colspan="3" class="py-2 px-4 text-right border border-gray-300 font-semibold">Total</td>
                    <td class="py-2 px-4 border border-gray-300">$550.00</td>
                </tr>
            </tfoot>
        </table>
    </div>
   <script>
        $(document).ready(function() {
            let callingData = () => {
                $.ajax({
                    type: "GET",
                    url: 'api/invoice/{id}',
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
