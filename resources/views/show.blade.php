@include('layouts.header')

<section class="py-8 md:py-16 antialiased">
    
    <div class="xl:container mx-auto">
        <div class="mb-6">
            <h1 class="text-center mb-2 text-2xl font-bold leading-none tracking-tight text-slate-800 md:text-3xl lg:text-4xl">
                Product Details
            </h1>
            <p class="text-center text-slate-700">
                View product details below.
            </p>
            <hr class="my-6 border-gray-200 sm:mx-auto lg:my-8" />
        </div>

        <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
        <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">

            <div class="shrink-0 max-w-md lg:max-w-lg mx-auto">
                @if ($product->image)
                <img class="w-full" src="{{ asset('storage/products/' . basename($product->image)) }}" alt="{{ $product->name }}"/>
                @else
                <img class="w-full" src="{{ asset('storage/products/default.svg') }}" alt="{{ $product->name }}" alt="" />
                @endif
            </div>

            <div class="mt-6 sm:mt-8 lg:mt-0">
                <h1
                    class="text-xl font-semibold text-slate-900 sm:text-2xl"
                >
                    {{ $product->name }}
                </h1>

                <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                    <p
                    class="text-2xl font-extrabold text-slate-900 sm:text-3xl"
                    >
                    ${{ $product->price }}
                    </p>
                </div>

                <hr class="my-6 md:my-8 border-slate-200 " />

                <p class="mb-6 text-slate-500">
                    {{ $product->description }}
                </p>

                <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    <a
                      href="{{ route('products.index') }}"
                      title=""
                      class="text-white mt-4 sm:mt-0 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none flex items-center justify-center"
                      role="button"
                    >
                      Back to dashboard
                    </a>
                </div>

            </div>
        </div>
        </div>
    </div>
</section>

@include('layouts.footer')