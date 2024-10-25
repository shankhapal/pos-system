
<x-app-layout>
    <div class="d-flex">
       <!-- Main Content -->
        <div class="flex-grow p-6">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('POS Dashboard') }}
                </h2>
            </x-slot>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <!-- Display Sales Stats -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-bold">{{ __('Sales Summary') }}</h3>
                            <p>{{ __("Today's Sales: $1000") }}</p>
                            <p>{{ __("Total Transactions: 20") }}</p>
                        </div>
                    </div>

                    <!-- Display Inventory Section -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-bold">{{ __('Inventory Status') }}</h3>
                            <ul>
                                <li>{{ __("Product A: 50 units left") }}</li>
                                <li>{{ __("Product B: 20 units left") }}</li>
                                <li>{{ __("Product C: Out of Stock") }}</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Display Recent Transactions -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h3 class="text-lg font-bold">{{ __('Recent Transactions') }}</h3>
                            <table class="min-w-full text-left">
                                <thead>
                                    <tr>
                                        <th>{{ __('Transaction ID') }}</th>
                                        <th>{{ __('Customer') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Date') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#1</td>
                                        <td>John Doe</td>
                                        <td>$500</td>
                                        <td>2024-10-24</td>
                                    </tr>
                                    <tr>
                                        <td>#2</td>
                                        <td>Jane Smith</td>
                                        <td>$300</td>
                                        <td>2024-10-24</td>
                                    </tr>
                                    <!-- Add more transactions as needed -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
