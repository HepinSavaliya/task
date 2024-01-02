<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Product Details
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="row">
                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9">{{ $product->name }}</dd>

                        <dt class="col-sm-3">Price</dt>
                        <dd class="col-sm-9">{{ $product->price }}</dd>

                        <dt class="col-sm-3">Last Price</dt>
                        <dd class="col-sm-9">{{ $product->last_price }}</dd>

                        <dt class="col-sm-3">Description</dt>
                        <dd class="col-sm-9">{{ $product->description }}</dd>

                        <dt class="col-sm-3">Thumbnail</dt>
                        <dd class="col-sm-9">
                            @if($product->feature_image)
                                <img src="{{ asset(Storage::url("products/".$product->feature_image)) }}" alt="Image" style="max-width: 50px; max-height: 50px;">
                            @endif
                        </dd>
                    </dl>
                    @if(count($product->features) > 0)
                        <h4>Products Feature</h4>
                        @foreach($product->features as $feature)
                            <dl class="row">
                                <dt class="col-sm-3">Product Name</dt>
                                <dd class="col-sm-9">{{ $feature->product->name }}</dd>

                                <dt class="col-sm-3">Feature Name</dt>
                                <dd class="col-sm-9">{{ $feature->name }}</dd>

                                <dt class="col-sm-3">Feature Value</dt>
                                <dd class="col-sm-9">{{ $feature->value }}</dd>

                            </dl>
                            <hr>
                        @endforeach
                    @endif
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>