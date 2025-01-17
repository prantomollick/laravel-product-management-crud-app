@include ('layouts.header')

<section class="bg-inherit py-20">
    <div class="xl:container mx-auto">
        <div class="mb-6">
            <h1 class="text-center mb-2 text-2xl font-bold leading-none tracking-tight text-slate-800 md:text-3xl lg:text-4xl">Create Product</h1>
            <p class="text-center text-slate-700">Create a new product by filling out the form below.</p>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        </div>

        <div class="max-w-5xl mx-auto">
            <form>
                <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                    <div class="mb-5">
                        <label for="product-name" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                        <input type="product-name" id="email" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter product name" />
                        <p class="mt-2 text-sm text-green-600 hidden"><span class="font-medium">Alright!</span> Username available!</p>
                    </div>

                    <div class="mb-5">
                        <label for="product-price" class="block mb-2 text-sm font-medium text-gray-900">Product Price</label>
                        <input type="number" id="product-price" step="0.01" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Enter price in USD" required />
                        <p class="mt-2 text-sm text-green-600 hidden"><span class="font-medium">Alright!</span> Username available!</p>
                    </div>

                    <div class="mb-5">
                        <label for="product-stock" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                        <input type="number" id="product-stock" step="1" class="bg-slate-100 border border-slate-400 text-slate-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" required />
                        <p class="mt-2 text-sm text-green-600 hidden"><span class="font-medium">Alright!</span> Username available!</p>
                    </div>

                </div>

                <div class="mb-5">
                    <label for="product-stock" class="block mb-2 text-sm font-medium text-gray-900">Product Name</label>
                    <textarea id="message" rows="4" class="block p-2.5 w-full text-sm text-slate-900 bg-slate-100 rounded-lg border border-slate-400 focus:ring-blue-500 focus:border-blue-500" placeholder="Product Description...."></textarea>
                    <p class="mt-2 text-sm text-red-600"><span class="font-medium">Oops!</span> Username already taken!</p>
                </div>


                <div class="flex items-center justify-center max-w-sm mb-5">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-slate-400 border-dashed rounded-lg cursor-pointer bg-slate-100 hover:bg-slate-200">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-slate-600 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                            </svg>
                            <p class="mb-2 text-sm text-slate-600"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-slate-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div> 
                


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Create Product</button>
            </form>
       </div>
    </div>
</section>

@include('layouts.footer')