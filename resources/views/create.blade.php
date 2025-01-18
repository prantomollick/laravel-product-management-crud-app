@include ('layouts.header')

<section class="bg-inherit py-20">
    <div class="xl:container mx-auto">
        <div class="mb-6">
            <h1 class="text-center mb-2 text-2xl font-bold leading-none tracking-tight text-slate-800 md:text-3xl lg:text-4xl">Create Product</h1>
            <p class="text-center text-slate-700">Create a new product by filling out the form below.</p>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        </div>

        <div class="max-w-5xl mx-auto px-8 md:px-8">
            <form action="{{ route('products.store') }}" method="POST" id="product-form" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                    <div class="mb-5">
                        <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                        <input type="product-name" name='name' id="product-name" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product name" />
                        <p id="product-name-error" class="text-sm text-red-600 hidden"></p>
                    </div>

                    <div class="mb-5">
                        <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900">Product Price</label>
                        <input type="number" name="price" id="product-price" step="0.01" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter price in USD" />
                        <p id="product-price-error" class="text-sm text-red-600 hidden"></p>
                    </div>

                    <div class="mb-5">
                        <label for="product-stock" class="block mb-2 text-sm font-medium text-gray-900">Product Stock</label>
                        <input type="number" name="stock" id="product-stock" step="1" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter Stock Amount" />
                        <p id="product-stock-error" class="text-sm text-red-600 hidden"></p>
                    </div>

                </div>

                <div class="mb-5">
                    <label for="product-description" class="block mb-2 text-sm font-medium text-gray-900">Product Description</label>
                    <textarea id="product-description" name="description" rows="4" class="block p-2.5 w-full text-sm text-slate-900 bg-slate-100 rounded-lg border border-slate-400 focus:ring-blue-500 focus:border-blue-500" placeholder="Product Description...."></textarea>
                    <p id="product-description-error" class="text-sm text-red-600 hidden"></p>
                </div>

                <!-- Drag and Drop File Upload -->
                <div class="mb-5">
                    <div id="image-preview-container" class="hidden">
                        <h3 class="text-sm text-gray-700 mb-2">Preview:</h3>
                        <img id="image-preview" src="#" alt="Image Preview" class="w-64 h-64 object-cover rounded-lg border border-gray-300" />
                    </div>
                    <!-- Drag and Drop Image Upload -->
                    <div class="flex items-center justify-center w-full md:max-w-lg mb-5">
                        <div id="dropzone" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-400 border-dashed rounded-lg cursor-pointer bg-slate-100 hover:bg-slate-200">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-slate-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-slate-600"><span class="font-semibold">Drag and drop</span> or click to upload</p>
                                <p class="text-xs text-slate-500">JPEG, PNG, JPG, GIF (Max: 800 KB)</p>
                            </div>
                        </div>
                        <input id="product-image" name="image" type="file" class="hidden" />
                    </div>

                    <p id="product-image-name" class="text-sm text-green-600 hidden"></p>
                    <p id="product-image-error" class="text-sm text-red-600 hidden"></p>

                </div>
                <!-- Image Preview -->


                <!-- Upload Progress Bar -->
                <div id="upload-progress" class="w-full bg-gray-200 rounded-full h-2.5 hidden my-5">
                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: 0%"></div>
                </div>

                <button type="submit" id="submit-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create Product</button>
            </form>
       </div>
    </div>
</section>

@include('layouts.footer')