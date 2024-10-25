@include('pages.header')

<x-app-layout>
    <div class="d-flex flex-column flex-md-row">
        <!-- Main Content -->
        <div class="flex-grow p-4 p-md-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('POS Billing') }}
                </h2>
            </x-slot>
        </div>
    </div>

    <!-- Responsive Card for POS Billing Form -->
    <div class="card">
        <div class="card-body">
            <!-- Product Search and Add Section -->
            <div class="row">
                <div class="col-12 col-sm-8 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="product" placeholder="Search product name">
                </div>
                <div class="col-6 col-sm-2 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="price" placeholder="Enter Quantity">
                </div>
                <div class="col-6 col-sm-2">
                    <button class="btn btn-primary w-100">Enter Item</button>
                </div>
            </div>

            <!-- Table Section with Responsive Wrapping -->
            <div class="row mt-4">
                <div class="col-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Disc (%)</th>
                                    <th>Discount Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="productTable">
                                <!-- Dynamically inserted rows will appear here -->
                            </tbody>
                        </table>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td>
                                    <label for="sub-total">Sub Total</label>
                                    <input type="text" class="form-control" id="subTotal" placeholder="Sub Total" readonly>
                                </td>
                                <td>
                                    <label for="discoun-price">Discount Price</label>
                                    <input type="text" class="form-control" id="discountPrice" placeholder="Discount Price" readonly>
                                </td>
                                <td>
                                    <label for="total">Total</label>
                                    <input type="text" class="form-control" id="total" placeholder="Total" readonly>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
                <div class="col-12 col-md-4 mt-4 mt-md-0">
                    <div class="table-responsive">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>Rate</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td><button type="button" class="btn btn-primary w-100">Submit</button></td>
                                <td><button type="button" class="btn btn-secondary w-100">Submit & Print</button></td>
                                <td><button type="button" class="btn btn-success w-100">Cancel</button></td>
                            </tr>
                            <tr>
                                <td><button type="button" class="btn btn-danger w-100">Return Item</button></td>
                                <td><button type="button" class="btn btn-warning w-100">Bill History</button></td>
                                <td><button type="button" class="btn btn-info w-100">Add Creditor</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@include('pages.footer')

<script>
    const products = []; // Array to hold added products

    document.querySelector('.btn-primary').addEventListener('click', function() {
        const productName = document.getElementById('product').value;
        const price = parseFloat(document.getElementById('price').value);
        const discountRate = 10; // Discount rate in percentage
        const quantity = 1; // Default quantity, modify as needed

        // Validate inputs
        if (!productName || isNaN(price)) {
            alert('Please enter a valid product name and price.');
            return;
        }

        // Calculate discount and total price for each product
        const discountAmount = (price * discountRate) / 100;
        const discountedPrice = price - discountAmount;
        const total = discountedPrice * quantity;

        // Add the product details to the products array
        products.push({
            productName,
            price,
            quantity,
            discountRate,
            discountedPrice,
            total
        });

        // Update the product table
        updateProductTable();

        // Clear input fields
        document.getElementById('product').value = '';
        document.getElementById('price').value = '';
    });

    function updateProductTable() {
        const tableBody = document.getElementById('productTable');
        tableBody.innerHTML = ''; // Clear existing rows

        let subtotal = 0;
        let totalDiscount = 0;

        // Populate the table with product rows
        products.forEach((product, index) => {
            subtotal += product.total;
            totalDiscount += product.price * (product.discountRate / 100) * product.quantity;

            const row = `
                <tr>
                    <td>${index + 1}</td> <!-- Product ID -->
                    <td>${product.productName}</td>
                    <td>${product.quantity}</td>
                    <td>${product.price.toFixed(2)}</td>
                    <td>${product.discountRate}%</td>
                    <td>${product.discountedPrice.toFixed(2)}</td>
                    <td>${product.total.toFixed(2)}</td>
                </tr>
            `;

            tableBody.insertAdjacentHTML('beforeend', row);
        });

        // Update the calculation fields
        document.getElementById('subTotal').value = subtotal.toFixed(2);
        document.getElementById('discountPrice').value = totalDiscount.toFixed(2);
        document.getElementById('total').value = (subtotal - totalDiscount).toFixed(2);
    }
</script>

