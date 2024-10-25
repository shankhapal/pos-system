@include('pages.header')

<x-app-layout>
    <div class="d-flex">
        <!-- Main Content -->
        <div class="flex-grow p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('POS Billing') }}
                </h2>
            </x-slot>
        </div>
    </div>

    <!-- Ensure that Bootstrap classes are properly applied -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <input type="text" class="form-control" id="product" placeholder="Search product name">
            </div>
            <div class="col-sm-2">
                <input type="text" class="form-control" id="price" placeholder="Enter Quantity">
            </div>
            <div class="col-sm-2">
                <button class="btn btn-primary w-100">Enter Item</button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-8">
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
            <div class="col-sm-4">
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
                    <tbody id="">
                        <!-- Dynamically inserted rows will appear here -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</x-app-layout>

@include('pages.footer')

<script>
    document.querySelector('.btn-primary').addEventListener('click', function() {
    // Get the product details
    const product = document.getElementById('product').value;
    const price = parseFloat(document.getElementById('price').value);
    const discount = 10; // Set a default discount percentage (can be dynamic)

    if (!product || isNaN(price)) {
        alert('Please enter valid product name and price.');
        return;
    }

    // Calculate discount price and total
    const discountAmount = (price * discount) / 100;
    const discountedPrice = price - discountAmount;
    const total = discountedPrice; // Update total based on quantity or other factors if needed

    // Generate a new row for the table
    const newRow = `
        <tr>
            <td>1</td> <!-- Product ID (can be dynamic if available) -->
            <td>${product}</td>
            <td>1</td> <!-- Quantity, modify this for dynamic values -->
            <td>${price.toFixed(2)}</td>
            <td>${discount}%</td>
            <td>${discountedPrice.toFixed(2)}</td>
            <td>${total.toFixed(2)}</td>
        </tr>
    `;

    // Insert the new row into the table
    document.getElementById('productTable').insertAdjacentHTML('beforeend', newRow);

    // Clear the input fields
    document.getElementById('product').value = '';
    document.getElementById('price').value = '';
});

</script>