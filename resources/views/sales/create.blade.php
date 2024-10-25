@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Sale</h1>
    <form action="{{ route('sales.store') }}" method="POST">
        @csrf
        <!-- Add fields for the sale here -->
        <div class="mb-3">
            <label for="product" class="form-label">Product</label>
            <input type="text" class="form-control" id="product" name="product" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
