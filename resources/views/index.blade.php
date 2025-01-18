@include('layouts.header')

<section class="pt-20 pb-12">
    <div class="xl:container mx-auto text-center">
        <h1 class="text-center mb-4 text-3xl font-bold leading-none tracking-tight text-slate-800 md:text-4xl lg:text-5xl">Laravel 11 Product Management CRUD APP</h1>
        <p class="mx-auto mb-6 text-lg font-normal text-slate-700 lg:text-xl sm:px-16 xl:px-48 md:max-w-7xl">
            This Laravel Product Management System supports creating, reading, updating, and deleting products with ease. Utilizing Eloquent ORM, it offers essential features like sorting, searching, and a user-friendly interface, all while maintaining clean code practices.
        </p>
        <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Product
            <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
    </div>
</section>



<main class="bg-inherit">
    <div class="xl:container mx-auto">

        <div class="mb-6 text-center">
            @if (session('success'))
                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100" role="alert">
                    <span class="font-medium">Success alert!</span> {{ session('success') }}
                </div>
            @endif
        
            @if ($errors->any())
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                <span class="font-medium">Danger alert!</span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Your content here -->
        </div>

        <div class="relative overflow-x-auto p-6 bg-white rounded-lg">

            <div class="flex items-center justify-between flex-column md:flex-row flex-wrap space-y-4 md:space-y-0 mb-6">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="sr-only inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
                        <span class="sr-only">Action button</span>
                        Action
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Reward</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Promote</a>
                            </li>
                            <li>
                                <a href="#" class="block px-4 py-2 hover:bg-gray-100">Activate account</a>
                            </li>
                        </ul>
                        <div class="py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Delete User</a>
                        </div>
                    </div>
                </div>

                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="text" id="table-search-product" class="h-11 block ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                </div>
            </div>

            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-16 py-3">
                            NO
                        </th>

                        <th scope="col" class="px-16 py-3">
                            <span class="sr-only">Image</span>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Details
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                       
                        <th scope="col" class="px-6 py-3">
                            Stock
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100" id="product-list">
                    @include('partials.product_rows', ['products' => $products])
                </tbody>

            </table>

            {{-- {{ !!$products->withqueryString()->links('pagination::tailwind')}} --}}

            <!-- Edit user modal -->
            <div id="deleteModal" tabindex="-1" aria-hidden="true" class="bg-slate-300 bg-opacity-85 hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 text-center bg-white rounded-lg shadow sm:p-5">
                        <button type="button" class="text-slate-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="deleteModal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <svg class="text-slate-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        <p class="mb-4 text-slate-500">Are you sure you want to delete this item?</p>
                        <div class="flex justify-center items-center space-x-4">
                            <button data-modal-toggle="deleteModal" type="button" class="py-2 px-3 text-sm font-medium text-slate-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-gray-900 focus:z-10">
                                No, cancel
                            </button>
                            <form id="deleteForm" action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" role="submit" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                                    Yes, I'm sure
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


<script>
    document.addEventListener("DOMContentLoaded", function () {
            $("#table-search-product").on("input", function () {
            // debugger;
            let query = $(this).val();
            console.log(query);

            $.ajax({
                url: '{{ route("products.search") }}',
                method: "GET",
                data: { query: query },
                success: function (response) {
                    $('#product-list').html(response);
                },
                error: function () {
                    console.log("An error occurred. Please try again.");
                },
            });
        });
    });
</script>

@include('layouts.footer')
   

