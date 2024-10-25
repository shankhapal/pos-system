@include('pages.header')

<x-app-layout>
    <div class="d-flex flex-column flex-md-row">
        <!-- Main Content -->
        <div class="flex-grow p-4 p-md-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('POS Product') }}
                </h2>
            </x-slot>
        </div>
    </div>

    <!-- Responsive Card for POS Billing Form -->
    <div class="card">
        <div class="card-body">
          <div class="container mt-5">
            <!-- Add Product Button -->
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">
                Add Product
            </button>
                <!-- Product List Table -->
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example row -->
                        <tr>
                            <th scope="row">1</th>
                            <td>Sample Product</td>
                            <td>$20.00</td>
                            <td>5</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </td>
                        </tr>
                        <!-- Additional rows will be added here dynamically -->
                    </tbody>
                </table>
            </div>
          
            <!-- Add Product Modal -->
            <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addProductModalLabel">Add Product</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="addProductForm">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productPrice" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="productPrice" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productQuantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="productQuantity" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

@include('pages.footer')
<script>
// Example script to handle form submission (add functionality as needed)
document.getElementById('addProductForm').addEventListener('submit', function (event) {
    event.preventDefault();
    // Handle form submission (e.g., add the new product to the table)
    alert('Product added successfully!');
    document.getElementById('addProductForm').reset();
    var addProductModal = new bootstrap.Modal(document.getElementById('addProductModal'));
    addProductModal.hide();
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
