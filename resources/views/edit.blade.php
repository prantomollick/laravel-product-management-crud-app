@include ('layouts.header')


<section class="bg-inherit py-20">
    <div class="xl:container mx-auto">
        <div class="mb-6">
            <h1 class="text-center mb-2 text-2xl font-bold leading-none tracking-tight text-slate-800 md:text-3xl lg:text-4xl">Update Product</h1>
            <p class="text-center text-slate-700">
                Update product details below.
            </p>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        </div>

        <div class="mb-6">
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

        <div class="max-w-5xl mx-auto px-8 md:px-8">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" id="product-form">
                @csrf
                @method('PUT')
                @include('partials.form', ['product' => $product])
                <button type="submit" id="submit-button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update Product</button>
                <a href="{{ route('products.index') }}" role="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-slate-900 focus:outline-none bg-white rounded-lg border border-slate-200 hover:bg-slate-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-slate-100">Dashboard</a>
            </form>
       </div>
    </div>
</section>

@include('layouts.footer')